<?php

namespace App\Modules\Beranda\Controllers;

use SimpleXMLElement;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Modules\Beranda\Models\BerandaModel;

class BerandaController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $loadModel = new BerandaModel();
        $css = ["https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css", "assets/custom/css/modules/beranda/beranda"];
        $js = ["https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", "assets/custom/js/modules/beranda/beranda"];
        $view = "v_index";
        $title = "DIFOSS";
        $data = $loadModel->biblio(null, 10);
        $content['data'] = $data;
        _renderView($view, $title, $content, $js, $css);
    }

    public function detail($id)
    {
        $decrypted = slim_decrypt($id);
        $finalId = null;

        if ($decrypted !== null && $decrypted !== '' && is_numeric($decrypted)) {
            $finalId = (int) $decrypted;
        } elseif (is_numeric($id) && ctype_digit((string) $id)) {
            $finalId = (int) $id;
        }

        if ($finalId === null || $finalId <= 0) {
            log_message('warning', 'BerandaController::detail - Invalid/rejected ID: ' . substr((string) $id, 0, 50));
            slim_alert('error', 'Link dokumen tidak valid atau sudah kedaluwarsa.');
            return redirect()->to(base_url());
        }

        $p = $this->request->getGet('p');
        $inXML = $this->request->getGet('inXML');

        if ($p === "show_detail") {
            return $this->_showDetail($finalId, $inXML);
        }

        $loadModel = new BerandaModel();
        $css = ["assets/custom/css/modules/beranda/beranda"];
        $js = ["assets/custom/js/modules/beranda/beranda"];
        $view = "v_detail";
        $title = "DIFOSS";

        $data = $loadModel->biblio($finalId);
        if (!$data) {
            slim_alert('error', 'Dokumen tidak ditemukan.');
            return redirect()->to(base_url());
        }

        $data->author      = $loadModel->biblio_author($finalId);
        $data->supervisor  = $loadModel->biblio_supervisor($finalId);
        $data->examiner    = $loadModel->biblio_examiner($finalId);
        $data->contributor = $loadModel->biblio_contributor($finalId);
        $data->topic       = $loadModel->biblio_topic($finalId);
        $data->attachment  = $loadModel->biblio_attachment($finalId);

        $content['data'] = $data;
        _renderView($view, $title, $content, $js, $css);
    }

    function _showDetail($biblio_id, $inXML = false)
    {
        if (!is_numeric($biblio_id) || (int) $biblio_id <= 0) {
            log_message('error', '_showDetail: Invalid biblio_id: ' . substr((string)$biblio_id, 0, 50));
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Record tidak ditemukan');
        }
        $biblio_id = (int) $biblio_id;

        if ($inXML) {
            $model = new BerandaModel();
            $sysConf = config('SysConf');

            $xml = new SimpleXMLElement(
                '<modsCollection xmlns:xlink="http://www.w3.org/1999/xlink" 
                                 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
                                 xmlns="http://www.loc.gov/mods/v3" 
                                 xmlns:slims="http://slims.web.id" 
                                 xsi:schemaLocation="http://www.loc.gov/mods/v3 http://www.loc.gov/standards/mods/v3/mods-3-3.xsd" />'
            );

            $modsNode = $xml->addChild('mods');
            $modsNode->addAttribute('version', '3.3');
            $modsNode->addAttribute('ID', $biblio_id);

            $data = $this->_getRecord($biblio_id);
            if ((!$data || !is_array($data))) {
                $getParamId = $this->request->getGet('id');
                if (!empty($getParamId) && is_numeric($getParamId)) {
                    $biblio_id = (int) $getParamId;
                    $data = $this->_getRecord($biblio_id);
                }
            }
            if (!$data || !is_array($data)) {
                $obj = $model->biblio($biblio_id);
                if ($obj) {
                    $data = (array) $obj;
                    $data['publisher_name'] = $data['publisher_name'] ?? ($data['publisher'] ?? '');
                    $data['gmd_name']       = $data['gmd_name'] ?? ($data['gmd'] ?? '');
                    $data['language_name']  = $data['language_name'] ?? ($data['language'] ?? '');
                    $data['publish_place']  = $data['publish_place'] ?? ($data['publisher_place'] ?? '');
                    $data['copyright_name'] = $data['copyright_name'] ?? ($data['copyright'] ?? '');
                    $data['item_type_name'] = $data['item_type_name'] ?? ($data['item_type'] ?? '');
                    $data['item_type_code'] = $data['item_type_code'] ?? '';
                    $data['copyright_id']   = $data['copyright_id'] ?? '';
                    $data['frequency']      = $data['frequency'] ?? 0;
                }
            }
            if (!$data || !is_array($data)) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Record tidak ditemukan');
            }

            $data['title'] = str_replace('/', '&#47;', $data['title'] ?? '');
            $_title_main = $data['title'];
            $_title_sub = '';
            $_title_statement_resp = '';

            if (strpos($data['title'], ':') !== false) {
                list($_title_main, $_title_sub) = array_map('trim', explode(':', $data['title'], 2));
            } elseif (strpos($data['title'], '/') !== false) {
                list($_title_main, $_title_statement_resp) = array_map('trim', explode('/', $data['title'], 2));
            }

            $titleInfo = $modsNode->addChild('titleInfo');
            $t = $titleInfo->addChild('title');
            $this->addCData($t, $_title_main);
            if ($_title_sub !== "") {
                $t_sub = $titleInfo->addChild('subTitle');
                $this->addCData($t_sub, $_title_sub);
            }

            $authors = $model->biblio_author($biblio_id);
            if (!empty($authors)) {
                foreach ($authors as $key => $author) {
                    $name = $modsNode->addChild('name');
                    $name->addAttribute('type', $sysConf->authority_type[$author->authority_type] ?? 'Personal Name');
                    $name->addAttribute('authority', $author->auth_list ?? '');
                    $name->addChild('namePart', $author->author_name ?? '');
                    $role = $name->addChild('role');
                    $role->addAttribute('type', 'text');
                    $role->addChild('roleTerm', $sysConf->authority_level[$author->level] ?? 'Primary Author');
                }
            }

            $supervisors = $model->biblio_supervisor($biblio_id);
            if (!empty($supervisors)) {
                foreach ($supervisors as $key => $spv) {
                    $name = $modsNode->addChild('name');
                    $name->addAttribute('type', $sysConf->supervisor_type[$spv->supervisor_type] ?? 'Personal Name');
                    $name->addAttribute('authority', $spv->supervisor_list ?? '');
                    $name->addChild('namePart', $spv->supervisor_name ?? '');
                    $role = $name->addChild('role');
                    $role->addAttribute('type', 'text');
                    $role->addChild('roleTerm', $sysConf->authority_level_supervisor[$spv->level] ?? 'Supervisor');
                }
            }

            $examiners = $model->biblio_examiner($biblio_id);
            if (!empty($examiners)) {
                foreach ($examiners as $key => $ex) {
                    $name = $modsNode->addChild('name');
                    $name->addAttribute('type', $sysConf->examiner_type[$ex->examiner_type] ?? 'Personal Name');
                    $name->addChild('namePart', $ex->examiner_name ?? '');
                    $role = $name->addChild('role');
                    $role->addAttribute('type', 'text');
                    $role->addChild('roleTerm', $sysConf->authority_level_examiner[$ex->level] ?? 'Examiner');
                }
            }

            $contributors = $model->biblio_contributor($biblio_id);
            if (!empty($contributors)) {
                foreach ($contributors as $key => $contributor) {
                    $name = $modsNode->addChild('name');
                    $name->addAttribute('type', $sysConf->contributor_type[$contributor->contributor_type] ?? 'Personal Name');
                    $name->addChild('namePart', $contributor->contributor_name ?? '');
                    $role = $name->addChild('role');
                    $role->addAttribute('type', 'text');
                    $role->addChild('roleTerm', $sysConf->authority_level_contributor[$contributor->level] ?? 'Contributor');
                }
            }

            $typeResource = $modsNode->addChild('typeOfResource', "mixed material");
            $typeResource->addAttribute("manuscript", "yes");
            $typeResource->addAttribute("collection", "yes");
            $marcgt = $modsNode->addChild("genre", "bibliography");
            $marcgt->addAttribute("authority", "marcgt");

            $originInfo = $modsNode->addChild('originInfo');
            $place = $originInfo->addChild('place');
            $place->addChild('placeTerm', $data['publish_place'] ?? '');
            $originInfo->addChild('publisher', $data['publisher_name'] ?? '');
            $originInfo->addChild('dateIssued', $data['publish_year'] ?? '');
            $freq = (int) ($data['frequency'] ?? 0);
            if ($freq > 0) {
                $originInfo->addChild('dateIssued', $data['frequency']);
            } else {
                $originInfo->addChild('dateIssued', 'monographic');
            }
            $originInfo->addChild('edition', $data['edition'] ?? '');

            $lang = $modsNode->addChild('language');
            $lang->addChild('languageTerm', $data['language_id'] ?? '');
            $lang->addChild('languageTerm', $data['language_name'] ?? '');

            $item = $modsNode->addChild('itemType');
            $code = $item->addChild('itemTypeTerm', $data['item_type_code'] ?? '');
            $code->addAttribute('type', 'code');
            $text = $item->addChild('itemTypeTerm', $data['item_type_name'] ?? '');
            $text->addAttribute('type', 'text');

            $copy = $modsNode->addChild('copyright');
            $code = $copy->addChild('copyrightTerm', $data['copyright_id'] ?? '');
            $code->addAttribute('type', 'code');
            $text = $copy->addChild('copyrightTerm', $data['copyright_name'] ?? '');
            $text->addAttribute('type', 'text');

            $physical = $modsNode->addChild('physicalDescription');
            $form = $physical->addChild('form', $data['gmd_name'] ?? '');
            $form->addAttribute('authority', 'gmd');
            $exten = $physical->addChild('extent', $data['collation'] ?? '');

            if (!empty($data['series_title'])) {
                $relatedItem = $modsNode->addChild('relatedItem');
                $relatedItem->addAttribute('type', 'series');
                $titleInfo = $relatedItem->addChild('titleInfo');
                $titleInfo->addChild('title', $data['series_title']);
            }

            $note = $modsNode->addChild('note', $data['notes'] ?? '');
            if ($_title_statement_resp != "") {
                $nc = $note->addChild('note');
                $this->addCData($nc, $_title_statement_resp);
                $nc->addAttribute('type', 'statement of responsibility');
            }

            $topics = $model->biblio_topic($biblio_id);
            if (!empty($topics)) {
                foreach ($topics as $key => $topic) {
                    $subject_type = strtolower($sysConf->subject_type[$topic->topic_type] ?? 'topic');
                    $sub = $modsNode->addChild('subject');
                    $sub->addAttribute('authority', $topic->auth_list ?? '');
                    $sub->addChild($subject_type, $topic->topic ?? '');
                }
            }

            $modsNode->addChild('classification', $data['classification'] ?? '');
            $modsNode->addChild('ministry', $data['code_ministry'] ?? '');
            $modsNode->addChild('studentID', $data['student_id'] ?? '');
            $identifier = $modsNode->addChild('identifier', str_replace(array('-', ' '), '', $data['isbn_issn'] ?? ''));
            $identifier->addAttribute('type', 'isbn');
            $modsNode->addChild('departementID', $data['departement'] ?? '');
            $modsNode->addChild('urlCrossref', $data['url_crossref'] ?? '');

            $loc = $modsNode->addChild('location');
            $loc->addChild('physicalLocation', ($sysConf->library['name'] ?? '') . ' ' . ($sysConf->library['subname'] ?? ''));
            $loc->addChild('shelfLocator', $data['call_number'] ?? '');
            $location = $model->biblio_location($biblio_id);
            if (!empty($location)) {
                $hold = $loc->addChild('holdingSimple');
                foreach ($location as $key => $val) {
                    $cpi = $hold->addChild('copyInformation');
                    $num = $cpi->addChild('numerationAndChronology', $val['item_code'] ?? '');
                    $num->addAttribute('type', '1');
                    $cpi->addChild('sublocation', ($val['location_name'] ?? '') . (!empty($val['site']) ? ' (' . $val['site'] . ')' : ''));
                    $cpi->addChild('shelfLocator', $val['call_number'] ?? '');
                }
            }

            $attachment = $model->biblio_attachment($biblio_id);
            if (!empty($attachment)) {
                $slims = $modsNode->addChild('slims:digitals');
                foreach ($attachment as $key => $val) {
                    if ($val->access_limit) continue;
                    $sdi = $slims->addChild('slims:digital_item');
                    $sdi->addAttribute('id', $val->file_id ?? '');
                    $sdi->addAttribute('url', trim($val->file_url ?? ''));
                    $sdi->addAttribute('path', htmlentities(($val->file_dir ?? '') . '/' . ($val->file_name ?? '')));
                    $sdi->addAttribute('mimetype', $val->mime_type ?? '');
                }
            }

            if (!empty($data['image'])) {
                $image = urlencode($data['image']);
                $sim = $modsNode->addChild('slims:image');
                $this->addCData($sim, $image);
            }

            $recordInfo = $modsNode->addChild('recordInfo');
            $recordInfo->addChild('recordIdentifier');
            $this->addCData($recordInfo, $biblio_id);
            $recordCreationDate = $recordInfo->addChild('recordCreationDate');
            $recordCreationDate->addAttribute('encoding', 'w3cdtf');
            $this->addCData($recordCreationDate, $data['input_date'] ?? date('Y-m-d'));
            $recordChangeDate = $recordInfo->addChild('recordChangeDate');
            $recordChangeDate->addAttribute('encoding', 'w3cdtf');
            $this->addCData($recordChangeDate, $data['last_update'] ?? date('Y-m-d H:i:s'));
            $recordInfo->addChild('recordOrigin', 'machine generated');

            return $this->respondXML($xml);
        }
    }

    private function respondXML(SimpleXMLElement $xml)
    {
        return $this->response
            ->setHeader('Content-Type', 'application/xml')
            ->setBody($xml->asXML());
    }

    function addCData(SimpleXMLElement $node, $cdata_text)
    {
        $dom = dom_import_simplexml($node);
        $owner = $dom->ownerDocument;
        $dom->appendChild($owner->createCDATASection($cdata_text));
    }

    function _getRecord($biblio_id)
    {
        if (!is_numeric($biblio_id) || (int) $biblio_id <= 0) {
            log_message('error', '_getRecord: Invalid biblio_id: ' . substr((string)$biblio_id, 0, 50));
            return null;
        }
        $biblio_id = (int) $biblio_id;

        $sql = "SELECT
                    b.*,
                    l.language_name,
                    p.publisher_name,
                    mc.copyright_id,
                    mc.copyright_name,
                    mit.item_type_name,
                    mit.item_type_code,
                    pl.place_name AS publish_place,
                    gmd.gmd_name,
                    fr.frequency
                FROM biblio AS b
                LEFT JOIN mst_gmd AS gmd ON b.gmd_id = gmd.gmd_id
                LEFT JOIN mst_language AS l ON b.language_id = l.language_id
                LEFT JOIN mst_publisher AS p ON b.publisher_id = p.publisher_id
                LEFT JOIN mst_place AS pl ON b.publish_place_id = pl.place_id
                LEFT JOIN mst_frequency AS fr ON b.frequency_id = fr.frequency_id
                LEFT JOIN mst_copyright AS mc ON b.copyright_id = mc.copyright_id
                LEFT JOIN mst_item_type AS mit ON b.item_type_id = mit.item_type_id
                WHERE b.biblio_id = :biblio_id:";

        return $this->db->query($sql, ['biblio_id' => $biblio_id])->getRowArray();
    }

    public function search()
    {
        $loadModel = new BerandaModel();
        $css = ["assets/custom/css/modules/beranda/beranda"];
        $js = [];
        $view = "v_search";
        $title = "DIFOSS";

        $searchQuery = $this->request->getGet('s');

        if (!is_null($searchQuery) && trim($searchQuery) !== '') {
            $data = $loadModel->search_biblio(trim($searchQuery));
        } else {
            $getParams = $this->request->getGet();
            if (!empty($getParams)) {
                $firstKey = array_key_first($getParams);
                $firstValue = $getParams[$firstKey];
                $data = $loadModel->search_biblio_specific($firstKey, $firstValue);
            } else {
                $data = [];
            }
        }

        $content['data'] = $data;
        _renderView($view, $title, $content, $js, $css);
    }

    public function author($id)
    {
        if (!is_numeric($id) || (int) $id <= 0) {
            slim_alert('error', 'Author tidak ditemukan');
            return redirect()->to(base_url());
        }

        $loadModel = new BerandaModel();
        $css = ["assets/custom/css/modules/beranda/beranda"];
        $js = [];
        $view = "v_author";
        $title = "DIFOSS";

        $profile = $loadModel->author_profile((int)$id);
        if (!$profile) {
            slim_alert('error', 'Author not found');
            return redirect()->to(base_url());
        }

        $content['profile'] = $profile;
        $content['works']   = $loadModel->author_works((int)$id);
        $content['yearly']  = $loadModel->author_yearly((int)$id);
        $content['collab']  = $loadModel->author_collaborators((int)$id);
        _renderView($view, $title, $content, $js, $css);
    }

    public function galaxy()
    {
        $css = ["assets/custom/css/modules/beranda/beranda"];
        $js = ["https://unpkg.com/vis-network@9.1.6/standalone/umd/vis-network.min.js"];
        $view = "v_galaxy";
        $title = "DIFOSS — Galaksi Riset";
        _renderView($view, $title, [], $js, $css);
    }

    public function galaxy_json()
    {
        $model = new BerandaModel();
        return $this->respond($model->galaxy_data());
    }

    public function rak()
    {
        $css = ["assets/custom/css/modules/beranda/beranda"];
        $js = [];
        $view = "v_rak";
        $title = "DIFOSS — Rak Virtual 3D";
        _renderView($view, $title, [], $js, $css);
    }

    public function rak_json()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT b.biblio_id, b.title, b.image, b.departement, b.publish_year,
                       (SELECT COUNT(*) FROM biblio_count bc WHERE bc.biblio_id = b.biblio_id) AS downloads
                FROM biblio b
                ORDER BY b.biblio_id DESC
                LIMIT 120";
        return $this->respond($db->query($sql)->getResult());
    }

    // ================= RANGKUI AI v3.0 — HYBRID INTELLIGENCE + DYNAMIC MODEL DISCOVERY =================
    public function ai()
    {
        $css = ["assets/custom/css/modules/beranda/beranda"];
        $js = [];
        $view = "v_ai";
        $title = "DIFOSS — RANGKUI AI";
        _renderView($view, $title, [], $js, $css);
    }

    public function ai_chat()
    {
        header('Content-Type: application/json; charset=utf-8');

        $qPost = $this->request->getPost('q');
        $qGet  = $this->request->getGet('q');
        $question = trim($qPost !== null ? $qPost : ($qGet !== null ? $qGet : ''));

        if (empty($question)) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Pertanyaan kosong']);
        }
        if (strlen($question) > 1200) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Pertanyaan terlalu panjang (max 1200 karakter)']);
        }

        // RATE LIMIT
        $session = session();
        $now = time();
        $log = $session->get('ai_log') ?: [];
        $log = array_filter($log, fn($t) => $t > $now - 60);
        if (count($log) >= 20) {
            return $this->response->setJSON([
                'ok' => false,
                'error' => 'Terlalu banyak pertanyaan. Coba lagi sebentar.'
            ]);
        }
        $log[] = $now;
        $session->set('ai_log', $log);

        // CONVERSATION MEMORY
        $history = $session->get('ai_history') ?: [];
        $history[] = ['role' => 'user', 'content' => $question];
        if (count($history) > 20) {
            $history = array_slice($history, -20);
        }

        // SMART ROUTING
        $route = $this->_routeIntent($question);

        // CONTEXT RETRIEVAL
        $model = new BerandaModel();
        $allDocs = [];
        $stats   = null;

        if ($route === 'repo' || $route === 'hybrid') {
            $specific = method_exists($model, 'ai_find_specific') ? $model->ai_find_specific($question) : [];
            $relevant = method_exists($model, 'ai_search_rich') ? $model->ai_search_rich($question, 5) : [];
            $seenIds  = [];
            foreach (array_merge($specific, $relevant) as $d) {
                if (is_object($d) && isset($d->biblio_id) && !isset($seenIds[$d->biblio_id])) {
                    $allDocs[] = $d;
                    $seenIds[$d->biblio_id] = true;
                }
            }
            $allDocs = array_slice($allDocs, 0, 5);
        }

        if ($route === 'repo' && preg_match('/(statistik|tren|top|ranking|berapa banyak|jumlah total|paling\s+(produktif|populer|aktif))/', mb_strtolower($question))) {
            $stats = method_exists($model, 'ai_stats') ? $model->ai_stats() : null;
        }

        // BUILD PROMPT
        $temperature = $route === 'repo' ? 0.5 : ($route === 'hybrid' ? 0.6 : 0.75);
        $maxTokens   = $route === 'repo' ? 900 : 2200;
        $prompt      = $this->_buildSmartPrompt($question, $allDocs, $stats, $route, $history);

        // ===== 🌐 GEMINI AI — COBA SEMUA MODEL YANG TERSEDIA (DYNAMIC DISCOVERY) =====
        $apiKey      = env('GEMINI_API_KEY', '');
        $answer      = null;
        $modelName   = '';
        $lastError   = '';
        $attempted   = 0;
        $allNotFound = true;

        if (!empty($apiKey)) {
            $client    = \Config\Services::curlrequest();
            $tryModels = $this->_getAllGeminiModels($apiKey, $client);

            foreach ($tryModels as $m) {
                if ($attempted >= 8) break; // batas percobaan agar respons tetap cepat
                $attempted++;

                $url = "https://generativelanguage.googleapis.com/v1beta/models/$m:generateContent?key=" . $apiKey;
                try {
                    $response = $client->post($url, [
                        'headers' => ['Content-Type' => 'application/json'],
                        'json' => [
                            'contents' => [['parts' => [['text' => $prompt]]]],
                            'generationConfig' => [
                                'temperature'     => $temperature,
                                'maxOutputTokens' => $maxTokens,
                                'topP'            => 0.95
                            ]
                        ],
                        'timeout'     => 25,
                        'http_errors' => false
                    ]);

                    $code = $response->getStatusCode();

                    // ✅ SUKSES
                    if ($code === 200) {
                        $allNotFound = false;
                        $body = json_decode($response->getBody(), true);
                        $cand = $body['candidates'][0]['content']['parts'][0]['text'] ?? null;
                        if ($cand !== null && trim($cand) !== '') {
                            $answer    = $cand;
                            $modelName = $m;
                            break;
                        }
                        $lastError = 'Model ' . $m . ' mengembalikan jawaban kosong';
                        continue;
                    }

                    // 🛑 KEY MATI — berhenti
                    if ($code === 401 || $code === 403) {
                        $lastError = 'API key tidak valid / ditolak (HTTP ' . $code . ')';
                        break;
                    }

                    // ️ KUOTA MODEL HABIS — lanjut ke model lain
                    if ($code === 429) {
                        $lastError = 'Kuota model ' . $m . ' habis — beralih ke model berikutnya';
                        continue;
                    }

                    // ⏭️ MODEL TIDAK ADA — lanjut
                    if ($code === 404) {
                        $lastError = 'Model ' . $m . ' tidak tersedia (HTTP 404)';
                        continue;
                    }

                    $allNotFound = false;
                    $lastError = 'HTTP ' . $code . ' pada model ' . $m;
                } catch (\Exception $e) {
                    $lastError = 'Koneksi gagal: ' . $e->getMessage();
                    continue;
                }
            }

            // Jika semua 404 → buang cache model
            if ($answer === null && $allNotFound && $attempted > 0) {
                \Config\Services::cache()->delete('rangkui_gemini_models');
            }
        } else {
            $lastError = 'GEMINI_API_KEY tidak ditemukan di file .env';
        }

        // POST-PROCESSING (fallback jujur)
        $finalAnswer = $answer;
        if ($finalAnswer === null) {
            if ($route === 'repo' || $route === 'hybrid') {
                $finalAnswer = $this->_buildFallbackRepo($question, $allDocs, $stats);
            } else {
                $finalAnswer = "⚠️ Maaf, layanan AI sedang offline saat ini.\n\n"
                    . "**Penyebab:** " . ($lastError ?: 'Tidak ada model yang merespons.') . "\n"
                    . "**Model dicoba:** " . $attempted . " model\n\n"
                    . "Silakan coba lagi sebentar, atau periksa `GEMINI_API_KEY` di file `.env`.";
            }
        } else {
            $finalAnswer = $this->_enrichAnswer($finalAnswer, $allDocs, $stats, $route);
        }

        // SAVE HISTORY
        $history[] = ['role' => 'bot', 'content' => $finalAnswer];
        $session->set('ai_history', $history);

        // SUGGESTIONS
        $suggestions = $this->_buildSmartSuggestions($route, $allDocs, $question);

        return $this->response->setJSON([
            'ok'           => true,
            'answer'       => $finalAnswer,
            'docs'         => $allDocs,
            'mode'         => $answer !== null ? 'ai' : 'local',
            'route'        => $route,
            'model'        => $modelName,
            'models_tried' => $attempted,
            'error_detail' => $lastError,
            'suggestions'  => $suggestions
        ]);
    }

    // ================ PRIVATE HELPERS (AI v3.0) ================

    private function _routeIntent($q)
    {
        $qLower = mb_strtolower($q);
        $repoScore = 0;
        $generalScore = 0;

        $repoKeywords = [
            'repositori', 'dokumen', 'skripsi', 'tesis', 'disertasi', 'karya ilmiah',
            'penulis repositori', 'pembimbing', 'mahasiswa', 'nim', 'biblio',
            'koleksi difoss', 'rangkui', 'perpustakaan', 'pustaka', 'abstrak',
            'departemen', 'jurusan', 'prodi', 'program studi'
        ];
        $statsKeywords = [
            'berapa banyak dokumen', 'jumlah dokumen', 'total karya', 'jumlah skripsi',
            'penulis paling produktif', 'departemen paling aktif', 'tren publikasi',
            'top author', 'statistik repositori'
        ];
        $docPatterns = [
            '/dokumen\s*#?\d+/i',
            '/nim\s*\d{8,20}/i',
            '/karya\s+(?:dari|oleh)\s+/i',
            '/biblio_id\s*[:=]\s*\d+/i'
        ];

        foreach ($repoKeywords as $kw) {
            if (mb_strpos($qLower, $kw) !== false) $repoScore += 2;
        }
        foreach ($statsKeywords as $kw) {
            if (mb_strpos($qLower, $kw) !== false) $repoScore += 3;
        }
        foreach ($docPatterns as $p) {
            if (preg_match($p, $q)) $repoScore += 3;
        }
        if (preg_match('/(rekomendasi|carikan|temukan|tampilkan)\s+(karya|dokumen|skripsi|tesis)/', $qLower)) {
            $repoScore += 2;
        }

        $generalPatterns = [
            '/(?:python|javascript|java|php|html|css|sql|react|vue|typescript|c\+\+|rust|go|kotlin)\b/i',
            '/(?:hitung|berapa hasil dari|\d+\s*[\+\-\*\/\^]\s*\d+)/',
            '/(?:filsafat|psikologi|sosiologi|ekonomi makro|geopolitik|fisika kuantum|relativitas|mekanika)/i',
            '/(?:puisi|cerpen|esai|tuliskan cerita|buat cerita|tulis puisi)/i',
            '/(?:resep|memasak|diet|olahraga|fitness)/i',
            '/(?:translate|terjemah|artinya|dalam bahasa|translate to)/i',
            '/(?:tips|trik|cara belajar|cara meningkatkan|lifehack)/i',
            '/(?:quantum|black hole|big bang|evolution|dna|genome|crispr)/i',
            '/(?:ai|artificial intelligence|machine learning|deep learning|neural network)/i',
            '/(?:siapa (?:presiden|perdana menteri|penemu|pemenang))/i'
        ];
        foreach ($generalPatterns as $p) {
            if (preg_match($p, $q)) $generalScore += 2;
        }
        if (preg_match('/^(jelaskan|apa itu|siapa itu|mengapa|kenapa|bagaimana cara)/', $qLower)) {
            $generalScore += 1;
        }
        if (strlen($q) > 150 && preg_match('/(bug|error|kode|function|class|import|def |console\.log)/i', $q)) {
            $generalScore += 3;
        }

        if ($repoScore >= 3 && $generalScore >= 3) return 'hybrid';
        if ($repoScore >= $generalScore && $repoScore >= 2) return 'repo';
        return 'general';
    }

    private function _buildSmartPrompt($question, $docs, $stats, $route, $history)
    {
        $historyText = $this->_formatHistory($history);

        if ($route === 'general') {
            return <<<PROMPT
Kamu adalah RANGKUI AI — asisten AI canggih, cerdas, hangat, dan sangat berpengetahuan luas. Kamu setara dengan ChatGPT, Claude, atau Gemini Advanced.

KEMAMPUAN KAMU:
- Menjawab pertanyaan umum: sains, sejarah, filsafat, teknologi, budaya, politik, kesehatan
- Menulis kode dalam bahasa apa pun (Python, JS, PHP, Java, dll) dengan syntax yang benar
- Matematika & reasoning kompleks (step-by-step)
- Analisis kritis & perbandingan mendalam
- Menulis kreatif: puisi, cerita, esai, email profesional
- Terjemahan multilingual dengan nuansa budaya
- Brainstorming & ide kreatif
- Penjelasan konsep rumit dalam bahasa sederhana dengan analogi

ATURAN JAWAB:
1. Bahasa Indonesia (kecuali user minta bahasa lain).
2. **Gunakan markdown LENGKAP**: heading ## dan ###, **bold**, *italic*, `inline code`, ```code blocks``` dengan language hint (```python, ```javascript, dll), bullet points -, numbered lists 1., > blockquotes.
3. Untuk coding: SELALU beri code block dengan language, plus penjelasan singkat 2-3 kalimat.
4. Untuk matematika: tampilkan step-by-step dengan simbol yang rapi.
5. Panjang jawaban sesuai kompleksitas: sederhana 2-4 kalimat, kompleks 300-800 kata.
6. Akhiri dengan pertanyaan tindak lanjut yang relevan jika natural.
7. Berikan contoh konkret atau analogi saat menjelaskan konsep abstrak.
{$historyText}

PERTANYAAN USER:
{$question}

Jawab sekarang (gunakan markdown lengkap dan profesional):
PROMPT;
        }

        $context = $this->_buildRepoContext($docs, $stats);

        if ($route === 'repo') {
            return <<<PROMPT
Kamu adalah RANGKUI AI — asisten riset cerdas repositori DIFOSS (perpustakaan digital kampus).

ATURAN KETAT:
1. Bahasa Indonesia yang profesional & ramah.
2. **WAJIB gunakan sitasi [1], [2], [3] saat merujuk dokumen dari konteks** — contoh: "Menurut [1], kepemimpinan resonan..."
3. Maksimal 500 kata, terstruktur dengan paragraf pendek.
4. **JANGAN mengarang fakta** — hanya gunakan data dari KONTEKS di bawah.
5. Gunakan markdown: **bold**, *italic*, bullet points, heading ## jika relevan.
6. Jangan sebutkan nomor dokumen ID ke user, gunakan nomor urut [1], [2], dst.
{$historyText}

{$context}

PERTANYAAN USER: {$question}

Jawab dengan sitasi akademik:
PROMPT;
        }

        return <<<PROMPT
Kamu adalah RANGKUI AI — asisten AI hybrid yang cerdas, memiliki dua kekuatan:
1. **Pengetahuan umum** yang luas (sains, filsafat, coding, budaya, dll)
2. **Spesialis repositori** repositori DIFOSS (dengan dokumen konkret yang bisa dikutip)

ATURAN:
1. Bahasa Indonesia, profesional, hangat.
2. Jawab dengan menggabungkan **pengetahuan umum yang mendalam** + **referensi dokumen dari repositori** jika relevan.
3. **WAJIB gunakan sitasi [1], [2] saat merujuk dokumen** dari konteks di bawah.
4. Gunakan markdown LENGKAP: heading ##, **bold**, bullet points, code blocks jika relevan.
5. Maksimal 700 kata.
6. Jika pertanyaan filosofis/konseptual, hubungkan dengan dokumen di repositori sebagai studi kasus.
7. Jika pertanyaan teknis, jawab dengan pengetahuan umum lalu beri contoh dari repositori jika ada.
{$historyText}

KONTEKS REPOSITORI (gunakan jika relevan):
{$context}

PERTANYAAN USER: {$question}

Jawab dengan memadukan pengetahuan umum + konteks repositori (gunakan markdown lengkap):
PROMPT;
    }

    private function _buildRepoContext($docs, $stats)
    {
        $ctx = "=== DATA REPOSITORI DIFOSS ===\n\n";
        if (!empty($docs)) {
            $ctx .= "DOKUMEN RELEVAN (" . count($docs) . " hasil):\n\n";
            foreach ($docs as $i => $d) {
                $idx = $i + 1;
                $abs = $d->notes ? substr(strip_tags($d->notes), 0, 600) : '(tidak ada abstrak)';
                $ctx .= "[$idx] ID:{$d->biblio_id} | Judul: {$d->title}\n";
                $ctx .= "   Penulis: " . ($d->authors ?? '-') . "\n";
                if (!empty($d->supervisors)) $ctx .= "   Pembimbing: {$d->supervisors}\n";
                $ctx .= "   Tahun: " . ($d->publish_year ?: '-') . "\n";
                if (!empty($d->departement)) $ctx .= "   Departemen: {$d->departement}\n";
                if (!empty($d->topics)) $ctx .= "   Subyek: {$d->topics}\n";
                if (!empty($d->classification)) $ctx .= "   DDC: {$d->classification}\n";
                $ctx .= "   Abstrak: {$abs}\n\n";
            }
        } else {
            $ctx .= "Tidak ada dokumen yang cocok dengan pertanyaan.\n\n";
        }
        if ($stats) {
            $ctx .= "\n=== STATISTIK REPOSITORI ===\n";
            $ctx .= "Total dokumen: {$stats['total_docs']}\n";
            if (!empty($stats['total_authors'])) {
                $ctx .= "Top penulis: ";
                $ctx .= implode(', ', array_map(fn($a) => "{$a['author_name']} ({$a['total_karya']})", array_slice($stats['total_authors'], 0, 3)));
                $ctx .= "\n";
            }
            if (!empty($stats['year_trend'])) {
                $ctx .= "Tren publikasi:\n";
                foreach ($stats['year_trend'] as $y) {
                    $ctx .= "  - {$y['publish_year']}: {$y['total']} dokumen\n";
                }
            }
        }
        return $ctx;
    }

    private function _formatHistory($history)
    {
        if (count($history) < 3) return '';
        $out = "\n\nPERCAKAPAN SEBELUMNYA:\n";
        foreach (array_slice($history, -8, -1) as $h) {
            $role = $h['role'] === 'user' ? 'User' : 'RangkuiAI';
            $out .= "{$role}: " . substr($h['content'], 0, 250) . "\n";
        }
        return $out;
    }

    private function _enrichAnswer($answer, $docs, $stats, $route)
    {
        if ($route === 'hybrid' && !empty($docs)) {
            $answer .= "\n\n---\n📚 *Jawaban ini mempertimbangkan " . count($docs) . " dokumen relevan dari repositori DIFOSS.*";
        }
        return $answer;
    }

    private function _buildFallbackRepo($question, $docs, $stats)
    {
        if (empty($docs) && !$stats) {
            return 'Maaf, saya tidak menemukan dokumen yang cocok. Coba kata kunci lain seperti nama departemen, topik riset, atau nama penulis.';
        }
        $ans = "Saya menemukan " . count($docs) . " dokumen relevan:\n\n";
        foreach ($docs as $i => $d) {
            $ans .= "**[" . ($i + 1) . "] {$d->title}**\n";
            $ans .= "Penulis: " . ($d->authors ?? '-') . " · Tahun: " . ($d->publish_year ?: '-') . "\n\n";
        }
        return $ans;
    }

    private function _buildSmartSuggestions($route, $docs, $question)
    {
        $suggestions = [];

        if ($route === 'general') {
            $suggestions = [
                'Jelaskan quantum computing untuk pemula',
                'Tulis kode Python fibonacci dengan memoization',
                'Perbandingan filsafat Stoikisme vs Eksistensialisme',
                'Buat puisi tentang perpustakaan digital'
            ];
        } elseif ($route === 'repo' && !empty($docs)) {
            $first = $docs[0];
            $short = mb_strlen($first->title) > 40 ? mb_substr($first->title, 0, 37) . '...' : $first->title;
            $suggestions = [
                "Ringkasan dokumen [1]",
                "Siapa pembimbing '{$short}'?",
                "Karya serupa dari departemen sama",
                "Tren riset departemen ini"
            ];
        } elseif ($route === 'hybrid') {
            $suggestions = [
                'Jelaskan lebih dalam konsepnya',
                'Tampilkan dokumen terkait lainnya',
                'Apa implikasinya untuk riset?',
                'Bandingkan dengan penelitian lain'
            ];
        } else {
            $suggestions = [
                'Rekomendasi karya tentang AI',
                'Siapa penulis paling produktif?',
                'Tren publikasi 5 tahun terakhir',
                'Jelaskan machine learning'
            ];
        }

        return array_slice($suggestions, 0, 4);
    }

    /**
     * 🌐 DETEKSI SEMUA MODEL GEMINI yang tersedia untuk API key ini.
     * Hasil di-cache 1 jam agar hemat. Urutan: model prioritas dulu, lalu seluruh model lainnya.
     */
    private function _getAllGeminiModels($apiKey, $client)
    {
        $cache  = \Config\Services::cache();
        $cached = $cache->get('rangkui_gemini_models');
        if (is_array($cached) && !empty($cached)) {
            return $cached;
        }

        // Model prioritas (generasi terbaru → lama)
        $priority = [
            'gemini-3.5-flash-lite',
            'gemini-3.8-flash',
            'gemini-flash-latest',
            'gemini-3.5-flash',
            'gemini-3-pro',
            'gemini-2.5-flash',
            'gemini-2.5-pro',
            'gemini-2.0-flash',
            'gemini-1.5-flash',
        ];

        // Query daftar model LIVE dari Google
        $available = [];
        try {
            $resp = $client->get('https://generativelanguage.googleapis.com/v1beta/models', [
                'query'       => ['key' => $apiKey, 'pageSize' => 200],
                'timeout'     => 10,
                'http_errors' => false,
            ]);
            if ($resp->getStatusCode() === 200) {
                $body = json_decode($resp->getBody(), true);
                foreach ($body['models'] ?? [] as $mo) {
                    $name    = str_replace('models/', '', $mo['name'] ?? '');
                    $methods = $mo['supportedGenerationMethods'] ?? [];
                    if ($name === '') continue;
                    if (strpos($name, 'embedding') !== false) continue;
                    if (strpos($name, 'tuned') !== false) continue;
                    if (strpos($name, 'bidi') !== false) continue;
                    if (!empty($methods) && !in_array('generateContent', $methods)) continue;
                    $available[] = $name;
                }
            }
        } catch (\Exception $e) {
            // Query gagal → pakai daftar prioritas
        }

        if (empty($available)) {
            $list = $priority;
        } else {
            $list = array_values(array_intersect($priority, $available));
            $rest = array_values(array_diff($available, $priority));
            $list = array_merge($list, $rest);
        }

        $cache->save('rangkui_gemini_models', $list, 3600);
        return $list;
    }

    /**
     * 🔧 ENDPOINT DEBUG: lihat semua model yang terdeteksi untuk key ini.
     * Akses: GET /beranda/ai/models
     */
    public function ai_models()
    {
        $apiKey = env('GEMINI_API_KEY', '');
        if (empty($apiKey)) {
            return $this->response->setJSON(['ok' => false, 'error' => 'GEMINI_API_KEY kosong di .env']);
        }
        \Config\Services::cache()->delete('rangkui_gemini_models');
        $client = \Config\Services::curlrequest();
        $models = $this->_getAllGeminiModels($apiKey, $client);
        return $this->response->setJSON([
            'ok'     => true,
            'total'  => count($models),
            'models' => $models
        ]);
    }

    public function counting()
    {
        if (!$this->request->is('post')) {
            return $this->response->setJSON(['error' => 'Method not allowed'])->setStatusCode(405);
        }

        $file = $this->request->getPost('file');

        if (empty($file)) {
            return $this->response->setJSON(['error' => 'File parameter missing'])->setStatusCode(400);
        }

        $dec = @base64_decode($file, true);
        if ($dec === false) {
            log_message('warning', 'counting: Invalid base64 data');
            return $this->response->setJSON(['error' => 'Invalid file format'])->setStatusCode(400);
        }

        $parts = explode('|', $dec);

        if (count($parts) < 3 || !is_numeric($parts[0]) || !is_numeric($parts[1])) {
            log_message('warning', 'counting: Invalid format - ' . substr($dec, 0, 50));
            return $this->response->setJSON(['error' => 'Invalid file format'])->setStatusCode(400);
        }

        $data = [
            'biblio_id' => (int) $parts[0],
            'file_id'   => (int) $parts[1],
        ];

        if ($data['biblio_id'] <= 0 || $data['file_id'] <= 0) {
            return $this->response->setJSON(['error' => 'Invalid IDs'])->setStatusCode(400);
        }

        try {
            $this->db->table('biblio_count')->insert($data);
            echo json_encode($parts[2] ?? 'ok');
        } catch (\Throwable $e) {
            log_message('error', 'counting insert failed: ' . $e->getMessage());
            echo json_encode('error');
        }
    }
}