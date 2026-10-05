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

    /**
     * ✅ FIXED: Detail page dengan strict ID validation
     */
    public function detail($id)
    {
        // =============================================================
        // ✅ CRITICAL FIX: Validasi ketat ID — TOLAK semua non-numeric
        // =============================================================
        
        // Step 1: Coba decrypt
        $decrypted = slim_decrypt($id);
        
        // Step 2: Tentukan ID final
        $finalId = null;
        
        if ($decrypted !== null && $decrypted !== '' && is_numeric($decrypted)) {
            $finalId = (int) $decrypted;
        } elseif (is_numeric($id) && ctype_digit((string) $id)) {
            $finalId = (int) $id;
        }
        
        // Step 3: Validasi final ID
        if ($finalId === null || $finalId <= 0) {
            log_message('warning', 'BerandaController::detail - Invalid/rejected ID: ' . substr((string) $id, 0, 50));
            slim_alert('error', 'Link dokumen tidak valid atau sudah kedaluwarsa.');
            return redirect()->to(base_url());
        }
        
        // =============================================================
        // ✅ FIXED: Ganti extract() dengan explicit variable
        // extract() BERBAHAYA karena bisa overwrite variabel
        // =============================================================
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
        
        // ✅ Gunakan $finalId yang sudah dijamin integer positif
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

    /**
     * ✅ FIXED: Show detail dengan validasi biblio_id
     */
    function _showDetail($biblio_id, $inXML = false)
    {
        // ✅ Validasi biblio_id harus numeric
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

            // 1) Coba dari ID ter-enkripsi di URL
            $data = $this->_getRecord($biblio_id);

            // 2) Jika gagal, coba dari parameter ?id=...
            if ((!$data || !is_array($data))) {
                // ✅ FIXED: Validasi parameter id dari GET
                $getParamId = $this->request->getGet('id');
                if (!empty($getParamId) && is_numeric($getParamId)) {
                    $biblio_id = (int) $getParamId;
                    $data = $this->_getRecord($biblio_id);
                }
            }

            // 3) Jika masih gagal, pakai query model yang sama dengan halaman detail
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

            // Baru menyerah (404) jika semua sumber gagal
            if (!$data || !is_array($data)) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Record tidak ditemukan');
            }

            // PATCH: Gunakan null coalescing untuk field yang mungkin kosong
            $data['title'] = str_replace('/', '&#47;', $data['title'] ?? '');
            $_title_main = $data['title'];
            $_title_sub = '';
            $_title_statement_resp = '';

            if (strpos($data['title'], ':') !== false) {
                list($_title_main, $_title_sub) = array_map('trim', explode(':', $data['title'], 2));
            } elseif (strpos($data['title'], '/') !== false) {
                list($_title_main, $_title_statement_resp) = array_map('trim', explode('/', $data['title'], 2));
            }

            // title info
            $titleInfo = $modsNode->addChild('titleInfo');
            $t = $titleInfo->addChild('title');
            $this->addCData($t, $_title_main);

            if ($_title_sub !== "") {
                $t_sub = $titleInfo->addChild('subTitle');
                $this->addCData($t_sub, $_title_sub);
            }

            // authors
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

            // supervisors
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

            // examiners
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

            // contributors
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

            // imprint/publication data
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

            // language
            $lang = $modsNode->addChild('language');
            $lang->addChild('languageTerm', $data['language_id'] ?? '');
            $lang->addChild('languageTerm', $data['language_name'] ?? '');

            // item type
            $item = $modsNode->addChild('itemType');

            $code = $item->addChild('itemTypeTerm', $data['item_type_code'] ?? '');
            $code->addAttribute('type', 'code');

            $text = $item->addChild('itemTypeTerm', $data['item_type_name'] ?? '');
            $text->addAttribute('type', 'text');

            // copyright
            $copy = $modsNode->addChild('copyright');
            $code = $copy->addChild('copyrightTerm', $data['copyright_id'] ?? '');
            $code->addAttribute('type', 'code');

            $text = $copy->addChild('copyrightTerm', $data['copyright_name'] ?? '');
            $text->addAttribute('type', 'text');

            // Physical Description/Collation
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

            // note
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

            // classification
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
                    if ($val->access_limit) {
                        continue;
                    }

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

            // Create a new XML element for 'recordInfo'
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

    // Function to send XML response
    private function respondXML(SimpleXMLElement $xml)
    {
        return $this->response
            ->setHeader('Content-Type', 'application/xml')
            ->setBody($xml->asXML());
    }

    function addCData(SimpleXMLElement $node, $cdata_text)
    {
        // Import the SimpleXMLElement into DOM
        $dom = dom_import_simplexml($node);
        // Get the owner document (DOMDocument) of the node
        $owner = $dom->ownerDocument;
        // Create a CDATA section with the provided text
        $dom->appendChild($owner->createCDATASection($cdata_text));
    }

    /**
     * ✅ FIXED: _getRecord dengan validasi numeric
     */
    function _getRecord($biblio_id)
    {
        // ✅ Validasi parameter
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
                FROM
                    biblio AS b
                LEFT JOIN mst_gmd AS gmd ON b.gmd_id = gmd.gmd_id
                LEFT JOIN mst_language AS l ON b.language_id = l.language_id
                LEFT JOIN mst_publisher AS p ON b.publisher_id = p.publisher_id
                LEFT JOIN mst_place AS pl ON b.publish_place_id = pl.place_id
                LEFT JOIN mst_frequency AS fr ON b.frequency_id = fr.frequency_id
                LEFT JOIN mst_copyright AS mc ON b.copyright_id = mc.copyright_id
                LEFT JOIN mst_item_type AS mit ON b.item_type_id = mit.item_type_id
                WHERE
                    b.biblio_id = :biblio_id:";

        $record_detail = $this->db->query($sql, ['biblio_id' => $biblio_id])->getRowArray();

        return $record_detail;
    }

    /**
     * ✅ FIXED: Search dengan sanitasi input
     */
    public function search()
    {
        $loadModel = new BerandaModel();
        $css = ["assets/custom/css/modules/beranda/beranda"];
        $js = [];
        $view = "v_search";
        $title = "DIFOSS";
        
        // ✅ FIXED: Gunakan $this->request dan sanitasi input
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

    // ================= FITUR 2: PROFIL PENULIS CERDAS =================
    public function author($id)
    {
        // ✅ Validasi ID
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

    // ================= FITUR 3: GALAKSI RISET =================
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

    // ================= FITUR 4: RAK VIRTUAL 3D =================
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
        $list = $db->query($sql)->getResult();
        return $this->respond($list);
    }

    // ================= FITUR 5: RANGKUI AI =================
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
        
        // ✅ FIXED: Gunakan $this->request
        $qPost = $this->request->getPost('q');
        $qGet = $this->request->getGet('q');
        $question = trim($qPost !== null ? $qPost : ($qGet !== null ? $qGet : ''));
        
        if (empty($question)) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Pertanyaan kosong'])->setStatusCode(200);
        }
        if (strlen($question) > 500) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Pertanyaan terlalu panjang'])->setStatusCode(200);
        }

        $session = session();
        $now = time();
        $log = $session->get('ai_log') ?: [];
        $log = array_filter($log, function($t) use ($now) { return $t > $now - 60; });
        if (count($log) >= 10) {
            return $this->response->setJSON(['ok' => false, 'error' => 'Terlalu banyak pertanyaan. Coba lagi sebentar.'])->setStatusCode(200);
        }
        $log[] = $now;
        $session->set('ai_log', $log);

        $model = new BerandaModel();
        $docs = $model->ai_search($question, 5);

        $context = '';
        if (count($docs) > 0) {
            $context = "Dokumen relevan dari repositori DIFOSS:\n\n";
            foreach ($docs as $i => $d) {
                $abstrak = $d->notes ? substr(strip_tags($d->notes), 0, 400) : '(tidak ada abstrak)';
                $context .= "[$i] Judul: " . $d->title . "\nPenulis: " . ($d->authors ?: '-') . "\nTahun: " . ($d->publish_year ?: '-') . "\nAbstrak: " . $abstrak . "\n\n";
            }
        } else {
            $context = "Tidak ada dokumen di repositori.";
        }

        $apiKey = env('GEMINI_API_KEY', '');
        $answer = null;
        $modelName = '';

        if (!empty($apiKey)) {
            $prompt = "Kamu RANGKUI AI, asisten repositori DIFOSS. Jawab dalam Bahasa Indonesia, ramah, ringkas (maks 250 kata), dengan mengacu ke dokumen di konteks bila relevan.\n\nKONTEKS:\n$context\n\nPERTANYAAN: $question";
            
            $client = \Config\Services::curlrequest();
            $tryModels = ['gemini-2.5-flash', 'gemini-3.5-flash', 'gemini-2.5-pro', 'gemini-3.7-flash'];
            try {
                $listResp = $client->get("https://generativelanguage.googleapis.com/v1beta/models?key=" . $apiKey . "&pageSize=100", ['timeout' => 10, 'http_errors' => false]);
                if ($listResp->getStatusCode() === 200) {
                    $listBody = json_decode($listResp->getBody(), true);
                    $names = array_column($listBody['models'] ?? [], 'name');
                    foreach (['gemini-2.5-flash', 'gemini-2.0-flash', 'flash', 'gemini'] as $needle) {
                        foreach ($names as $nm) {
                            $clean = str_replace('models/', '', $nm);
                            if (strpos($nm, $needle) !== false && !in_array($clean, $tryModels)) $tryModels[] = $clean;
                        }
                        if (!empty($tryModels)) break;
                    }
                }
            } catch (\Exception $e) { }
            if (empty($tryModels)) $tryModels = ['gemini-2.5-flash'];
            
            foreach ($tryModels as $m) {
                $url = "https://generativelanguage.googleapis.com/v1beta/models/$m:generateContent?key=" . $apiKey;
                try {
                    $response = $client->post($url, [
                        'headers' => ['Content-Type' => 'application/json'],
                        'json' => [
                            'contents' => [['parts' => [['text' => $prompt]]]],
                            'generationConfig' => ['temperature' => 0.7, 'maxOutputTokens' => 600]
                        ],
                        'timeout' => 25,
                        'http_errors' => false
                    ]);
                    
                    if ($response->getStatusCode() === 200) {
                        $body = json_decode($response->getBody(), true);
                        $candidateAnswer = $body['candidates'][0]['content']['parts'][0]['text'] ?? null;
                        if ($candidateAnswer !== null) {
                            $answer = $candidateAnswer;
                            $modelName = $m;
                            break;
                        }
                    }
                } catch (\Exception $e) {
                    continue;
                }
            }
        }

        if ($answer !== null) {
            return $this->response->setJSON([
                'ok' => true, 
                'answer' => $answer, 
                'docs' => $docs, 
                'mode' => 'ai',
                'model' => $modelName
            ])->setStatusCode(200);
        }
        
        $fallbackMsg = count($docs) > 0 
            ? 'Saya belum bisa menggunakan AI saat ini, tapi saya menemukan dokumen-dokumen berikut untuk Anda:'
            : 'Belum ada dokumen di repositori yang cocok. Coba kata kunci umum seperti "tesis", "skripsi", atau nama penulis.';
        
        return $this->response->setJSON([
            'ok' => true,
            'answer' => $fallbackMsg,
            'docs' => $docs,
            'mode' => 'local'
        ])->setStatusCode(200);
    }

    /**
     * ✅ FIXED: Counting dengan validasi format base64
     */
    public function counting()
    {
        // ✅ FIXED: Validasi POST request
        if (!$this->request->is('post')) {
            return $this->response->setJSON(['error' => 'Method not allowed'])->setStatusCode(405);
        }

        // ✅ FIXED: Gunakan $this->request dan validasi format
        $file = $this->request->getPost('file');
        
        if (empty($file)) {
            return $this->response->setJSON(['error' => 'File parameter missing'])->setStatusCode(400);
        }
        
        $dec = @base64_decode($file, true); // strict mode
        if ($dec === false) {
            log_message('warning', 'counting: Invalid base64 data');
            return $this->response->setJSON(['error' => 'Invalid file format'])->setStatusCode(400);
        }
        
        $parts = explode('|', $dec);
        
        // ✅ Validasi format: harus ada 3 bagian dan numeric
        if (count($parts) < 3 || !is_numeric($parts[0]) || !is_numeric($parts[1])) {
            log_message('warning', 'counting: Invalid format - ' . substr($dec, 0, 50));
            return $this->response->setJSON(['error' => 'Invalid file format'])->setStatusCode(400);
        }

        $data = [
            'biblio_id' => (int) $parts[0],
            'file_id'   => (int) $parts[1],
        ];

        // ✅ Validasi ID positif
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