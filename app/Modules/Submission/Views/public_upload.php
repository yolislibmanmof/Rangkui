<div class="xu-ultimate-wrapper">
    <!-- Animated Background -->
    <div class="xu-animated-bg">
        <div class="xu-orb xu-orb-1"></div>
        <div class="xu-orb xu-orb-2"></div>
        <div class="xu-orb xu-orb-3"></div>
        <div class="xu-grid-pattern"></div>
    </div>

    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
                
                <!-- ULTIMATE CARD -->
                <div class="xuCard xu-ultimate-card">
                    
                    <!-- Animated Header -->
                    <div class="xu-header text-center mb-4">
                        <div class="xu-badge mb-3">
                            <i class="fa fa-cloud-upload"></i>
                            <span>AI-POWERED SUBMISSION</span>
                        </div>
                        <h1 class="xu-title">
                            Unggah <span class="xu-gradient-text">Karya Ilmiah</span>
                        </h1>
                        <p class="xu-subtitle">
                            Skripsi, Tesis, atau Disertasi Anda akan diproses dengan kecerdasan buatan
                            dan diverifikasi oleh tim admin sebelum tampil publik.
                        </p>
                    </div>

                    <!-- Flash Messages (Toast Style) -->
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="xu-toast xu-toast-error">
                            <i class="fa fa-exclamation-circle"></i>
                            <span><?= session()->getFlashdata('error') ?></span>
                            <button class="xu-toast-close">&times;</button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="xu-toast xu-toast-success">
                            <i class="fa fa-check-circle"></i>
                            <span><?= session()->getFlashdata('success') ?></span>
                            <button class="xu-toast-close">&times;</button>
                        </div>
                    <?php endif; ?>

                    <!-- MULTI-STEP WIZARD -->
                    <div class="xu-wizard">
                        <!-- Progress Stepper -->
                        <div class="xu-stepper mb-4">
                            <div class="xu-step active" data-step="1">
                                <div class="xu-step-circle">
                                    <span class="xu-step-number">1</span>
                                    <i class="fa fa-check xu-step-check"></i>
                                </div>
                                <div class="xu-step-label">
                                    <strong>Data Diri</strong>
                                    <small>Informasi pengunggah</small>
                                </div>
                            </div>
                            <div class="xu-step-line"></div>
                            <div class="xu-step" data-step="2">
                                <div class="xu-step-circle">
                                    <span class="xu-step-number">2</span>
                                    <i class="fa fa-check xu-step-check"></i>
                                </div>
                                <div class="xu-step-label">
                                    <strong>Dokumen</strong>
                                    <small>Upload PDF</small>
                                </div>
                            </div>
                            <div class="xu-step-line"></div>
                            <div class="xu-step" data-step="3">
                                <div class="xu-step-circle">
                                    <span class="xu-step-number">3</span>
                                    <i class="fa fa-check xu-step-check"></i>
                                </div>
                                <div class="xu-step-label">
                                    <strong>Metadata</strong>
                                    <small>Detail karya</small>
                                </div>
                            </div>
                            <div class="xu-step-line"></div>
                            <div class="xu-step" data-step="4">
                                <div class="xu-step-circle">
                                    <span class="xu-step-number">4</span>
                                    <i class="fa fa-check xu-step-check"></i>
                                </div>
                                <div class="xu-step-label">
                                    <strong>Konfirmasi</strong>
                                    <small>Review & kirim</small>
                                </div>
                            </div>
                        </div>

                        <!-- Overall Progress -->
                        <div class="xu-progress-bar mb-4">
                            <div class="xu-progress-fill" id="overallProgress" style="width: 25%"></div>
                        </div>

                        <form action="<?= base_url('unggah/proses') ?>" method="POST" enctype="multipart/form-data" id="formUnggah" novalidate>
                            
                            <!-- ============ STEP 1: DATA MAHASISWA ============ -->
                            <div class="xu-panel active" data-panel="1">
                                <div class="xu-section">
                                    <div class="xu-section-header">
                                        <div class="xu-section-icon"><i class="fa fa-user"></i></div>
                                        <div>
                                            <h3>Data Pengunggah</h3>
                                            <p class="text-muted mb-0">Identitas Anda sebagai pemilik karya</p>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="text" name="student_name" id="student_name" required 
                                                       value="<?= old('student_name') ?>"
                                                       placeholder=" ">
                                                <label for="student_name">
                                                    <i class="fa fa-user-circle"></i> Nama Lengkap <span class="xu-required">*</span>
                                                </label>
                                                <div class="xu-input-underline"></div>
                                                <small class="xu-hint">Sesuai kartu mahasiswa / dosen</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="text" name="student_id" id="student_id" required
                                                       value="<?= old('student_id') ?>"
                                                       placeholder=" ">
                                                <label for="student_id">
                                                    <i class="fa fa-id-card"></i> NIM / NIDN <span class="xu-required">*</span>
                                                </label>
                                                <div class="xu-input-underline"></div>
                                                <small class="xu-hint">Nomor induk akademik Anda</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="xu-input-group">
                                                <input type="text" name="departement" id="departement" required
                                                       value="<?= old('departement') ?>"
                                                       placeholder=" ">
                                                <label for="departement">
                                                    <i class="fa fa-graduation-cap"></i> Program Studi / Departemen <span class="xu-required">*</span>
                                                </label>
                                                <div class="xu-input-underline"></div>
                                                <small class="xu-hint">Contoh: Teknik Informatika, Hukum, Ekonomi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ============ STEP 2: FILE UPLOAD ============ -->
                            <div class="xu-panel" data-panel="2">
                                <div class="xu-section">
                                    <div class="xu-section-header">
                                        <div class="xu-section-icon xu-section-icon-pdf"><i class="fa fa-file-pdf-o"></i></div>
                                        <div>
                                            <h3>Dokumen Utama</h3>
                                            <p class="text-muted mb-0">Upload file PDF karya ilmiah Anda</p>
                                        </div>
                                    </div>

                                    <!-- Ultimate Dropzone -->
                                    <div class="xu-dropzone" id="dropzone">
                                        <input type="file" name="file_pdf" id="pdf_file" accept="application/pdf" class="xu-file-input" required>
                                        
                                        <div class="xu-dropzone-content" id="dropzoneContent">
                                            <div class="xu-dropzone-icon">
                                                <i class="fa fa-cloud-upload"></i>
                                            </div>
                                            <h4>Seret & Lepas File PDF di sini</h4>
                                            <p>atau klik untuk memilih file dari perangkat Anda</p>
                                            <div class="xu-dropzone-specs">
                                                <span><i class="fa fa-file-pdf-o"></i> PDF Only</span>
                                                <span><i class="fa fa-expand"></i> Maks. 20MB</span>
                                                <span><i class="fa fa-lock"></i> Tanpa password</span>
                                            </div>
                                        </div>

                                        <!-- File Preview (tampil setelah upload) -->
                                        <div class="xu-file-preview" id="filePreview" style="display:none">
                                            <div class="xu-file-preview-icon">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </div>
                                            <div class="xu-file-preview-info">
                                                <h5 id="fileName">document.pdf</h5>
                                                <small id="fileSize">0 KB</small>
                                                <div class="xu-file-preview-progress">
                                                    <div class="xu-file-preview-progress-fill" id="previewProgress"></div>
                                                </div>
                                            </div>
                                            <button type="button" class="xu-file-preview-remove" id="removeFile">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>

                                        <!-- PDF Preview Embed -->
                                        <div class="xu-pdf-preview" id="pdfPreview" style="display:none">
                                            <embed id="pdfEmbed" src="" type="application/pdf" width="100%" height="400px">
                                        </div>
                                    </div>

                                    <!-- AI Extract Button -->
                                    <div class="xu-ai-section mt-4">
                                        <button type="button" class="xu-ai-button" id="btnExtract" disabled>
                                            <div class="xu-ai-button-content">
                                                <div class="xu-ai-sparkles">
                                                    <i class="fa fa-magic"></i>
                                                </div>
                                                <div class="xu-ai-button-text">
                                                    <strong>Ekstrak Metadata dengan AI</strong>
                                                    <small>Powered by Gemini AI — Otomatis mengisi judul, abstrak, tahun</small>
                                                </div>
                                                <div class="xu-ai-button-arrow">
                                                    <i class="fa fa-arrow-right"></i>
                                                </div>
                                            </div>
                                        </button>
                                        
                                        <!-- AI Processing State -->
                                        <div class="xu-ai-processing" id="aiProcessing" style="display:none">
                                            <div class="xu-ai-ring"></div>
                                            <div>
                                                <strong>Menganalisis dokumen...</strong>
                                                <small id="aiStatus">Gemini AI sedang membaca PDF Anda</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ============ STEP 3: METADATA ============ -->
                            <div class="xu-panel" data-panel="3">
                                <div class="xu-section">
                                    <div class="xu-section-header">
                                        <div class="xu-section-icon xu-section-icon-book"><i class="fa fa-book"></i></div>
                                        <div>
                                            <h3>Metadata Karya</h3>
                                            <p class="text-muted mb-0">Lengkapi informasi detail karya ilmiah Anda</p>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-4">
                                        <!-- JUDUL -->
                                        <div class="col-12">
                                            <div class="xu-input-group">
                                                <input type="text" name="title" id="title" required
                                                       value="<?= old('title') ?>" placeholder=" ">
                                                <label for="title">
                                                    <i class="fa fa-header"></i> Judul Lengkap <span class="xu-required">*</span>
                                                </label>
                                                <div class="xu-input-underline"></div>
                                                <small class="xu-hint"><span id="titleCount">0</span> karakter · Minimal 10 karakter</small>
                                            </div>
                                        </div>

                                        <!-- JENIS KARYA & TAHUN -->
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <select name="gmd" id="gmd" required>
                                                    <option value="" disabled>Pilih jenis karya</option>
                                                    <option value="43">📕 Skripsi (S1)</option>
                                                    <option value="48">📘 Tesis (S2)</option>
                                                    <option value="47">📗 Disertasi (S3)</option>
                                                    <option value="1">📙 Lainnya</option>
                                                </select>
                                                <label for="gmd"><i class="fa fa-bookmark"></i> Jenis Karya <span class="xu-required">*</span></label>
                                                <div class="xu-input-underline"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="number" name="year" id="publish_year" required min="1900" max="2100"
                                                       value="<?= old('year', date('Y')) ?>" placeholder=" ">
                                                <label for="publish_year"><i class="fa fa-calendar"></i> Tahun Terbit <span class="xu-required">*</span></label>
                                                <div class="xu-input-underline"></div>
                                            </div>
                                        </div>

                                        <!-- ✅ KOLOM BARU: IDENTITAS MAHASISWA (dipindah dari step 1 untuk AI) -->
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="text" name="student_id" id="student_id_meta" required
                                                       value="<?= old('student_id') ?>" placeholder=" ">
                                                <label for="student_id_meta"><i class="fa fa-id-card"></i> NIM / NIDN <span class="xu-required">*</span></label>
                                                <div class="xu-input-underline"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="email" name="cp_email" id="cp_email"
                                                       value="<?= old('cp_email') ?>" placeholder=" ">
                                                <label for="cp_email"><i class="fa fa-envelope"></i> Email Kontak</label>
                                                <div class="xu-input-underline"></div>
                                            </div>
                                        </div>

                                        <!-- ✅ KOLOM BARU: PENULIS (Chip Input) -->
                                        <div class="col-12">
                                            <div class="xu-input-group">
                                                <input type="text" id="authors_input" placeholder="Tekan Enter untuk menambah penulis">
                                                <label for="authors_input"><i class="fa fa-users"></i> Penulis</label>
                                                <div class="xu-input-underline"></div>
                                                <div class="xu-chip-container" id="authors_chips" style="display:flex;flex-wrap:wrap;gap:6px;margin-top:8px;"></div>
                                                <input type="hidden" name="authors_text" id="authors_text">
                                            </div>
                                        </div>

                                        <!-- ✅ KOLOM BARU: PEMBIMBING & PENGUJI -->
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="text" id="supervisors_input" placeholder="Tekan Enter">
                                                <label for="supervisors_input"><i class="fa fa-user-tie"></i> Pembimbing</label>
                                                <div class="xu-input-underline"></div>
                                                <div class="xu-chip-container" id="supervisors_chips" style="display:flex;flex-wrap:wrap;gap:6px;margin-top:8px;"></div>
                                                <input type="hidden" name="supervisors_text" id="supervisors_text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="text" id="examiners_input" placeholder="Tekan Enter">
                                                <label for="examiners_input"><i class="fa fa-user-graduate"></i> Penguji</label>
                                                <div class="xu-input-underline"></div>
                                                <div class="xu-chip-container" id="examiners_chips" style="display:flex;flex-wrap:wrap;gap:6px;margin-top:8px;"></div>
                                                <input type="hidden" name="examiners_text" id="examiners_text">
                                            </div>
                                        </div>

                                        <!-- ✅ KOLOM BARU: PENERBIT & KOTA -->
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="text" name="publisher" id="publisher"
                                                       value="<?= old('publisher') ?>" placeholder=" ">
                                                <label for="publisher"><i class="fa fa-building"></i> Penerbit</label>
                                                <div class="xu-input-underline"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="text" name="place" id="place"
                                                       value="<?= old('place') ?>" placeholder=" ">
                                                <label for="place"><i class="fa fa-map-marker"></i> Kota Terbit</label>
                                                <div class="xu-input-underline"></div>
                                            </div>
                                        </div>

                                        <!-- ✅ KOLOM BARU: KOLASI & BAHASA -->
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="text" name="collation" id="collation"
                                                       value="<?= old('collation') ?>" placeholder=" ">
                                                <label for="collation"><i class="fa fa-file-text-o"></i> Kolasi (halaman)</label>
                                                <div class="xu-input-underline"></div>
                                                <small class="xu-hint">Contoh: 102 hal, xii + 200 hal</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <select name="language" id="language">
                                                    <option value="id" selected>🇮🇩 Indonesia</option>
                                                    <option value="en">🇺🇸 English</option>
                                                    <option value="ar">🇸🇦 Arabic</option>
                                                </select>
                                                <label for="language"><i class="fa fa-language"></i> Bahasa</label>
                                                <div class="xu-input-underline"></div>
                                            </div>
                                        </div>

                                        <!-- ✅ KOLOM BARU: SUBYEK (Chip Input) -->
                                        <div class="col-12">
                                            <div class="xu-input-group">
                                                <input type="text" id="topics_input" placeholder="Tekan Enter untuk menambah subyek">
                                                <label for="topics_input"><i class="fa fa-tags"></i> Subyek / Kata Kunci</label>
                                                <div class="xu-input-underline"></div>
                                                <div class="xu-chip-container" id="topics_chips" style="display:flex;flex-wrap:wrap;gap:6px;margin-top:8px;"></div>
                                                <input type="hidden" name="topics_text" id="topics_text">
                                            </div>
                                        </div>

                                        <!-- ABSTRAK INDONESIA -->
                                        <div class="col-12">
                                            <div class="xu-input-group xu-textarea-group">
                                                <textarea name="notes" id="notes" rows="8" required placeholder=" "><?= old('notes') ?></textarea>
                                                <label for="notes"><i class="fa fa-align-left"></i> Abstrak (Indonesia) <span class="xu-required">*</span></label>
                                                <div class="xu-input-underline"></div>
                                                <div class="xu-textarea-footer">
                                                    <small class="xu-hint"><span id="wordCount">0</span> kata · <span id="charCount">0</span> karakter</small>
                                                    <div class="xu-word-meter"><div class="xu-word-meter-fill" id="wordMeter"></div></div>
                                                    <small class="xu-hint">Target: minimal 100 kata</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ✅ KOLOM BARU: ABSTRAK INGGRIS -->
                                        <div class="col-12">
                                            <div class="xu-input-group xu-textarea-group">
                                                <textarea name="notes_en" id="notes_en" rows="6" placeholder=" "><?= old('notes_en') ?></textarea>
                                                <label for="notes_en"><i class="fa fa-globe"></i> Abstract (English)</label>
                                                <div class="xu-input-underline"></div>
                                                <div class="xu-textarea-footer">
                                                    <button type="button" id="btnTranslate" class="xu-btn xu-btn-next" style="padding:6px 14px;font-size:0.78rem;">
                                                        <i class="fa fa-magic"></i> Terjemahkan Otomatis
                                                    </button>
                                                    <small class="xu-hint">Opsional — akan diterjemahkan dari abstrak Indonesia</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ✅ KOLOM BARU: KLASIFIKASI & CALL NUMBER -->
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="text" name="class" id="class"
                                                       value="<?= old('class') ?>" placeholder=" ">
                                                <label for="class"><i class="fa fa-sitemap"></i> Klasifikasi DDC</label>
                                                <div class="xu-input-underline"></div>
                                                <small class="xu-hint">Contoh: 370.193</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="xu-input-group">
                                                <input type="text" name="callNumber" id="callNumber"
                                                       value="<?= old('callNumber') ?>" placeholder=" ">
                                                <label for="callNumber"><i class="fa fa-bookmark-o"></i> Call Number</label>
                                                <div class="xu-input-underline"></div>
                                                <small class="xu-hint">Contoh: 370.193 IND p</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ============ STEP 4: REVIEW ============ -->
                            <div class="xu-panel" data-panel="4">
                                <div class="xu-section">
                                    <div class="xu-section-header">
                                        <div class="xu-section-icon xu-section-icon-check"><i class="fa fa-check-circle"></i></div>
                                        <div>
                                            <h3>Konfirmasi & Kirim</h3>
                                            <p class="text-muted mb-0">Periksa kembali data Anda sebelum mengirim</p>
                                        </div>
                                    </div>

                                    <div class="xu-summary">
                                        <div class="xu-summary-row">
                                            <div class="xu-summary-icon"><i class="fa fa-user"></i></div>
                                            <div class="xu-summary-content">
                                                <small>Nama</small>
                                                <strong id="sumName">-</strong>
                                            </div>
                                        </div>
                                        <div class="xu-summary-row">
                                            <div class="xu-summary-icon"><i class="fa fa-id-card"></i></div>
                                            <div class="xu-summary-content">
                                                <small>NIM/NIDN</small>
                                                <strong id="sumId">-</strong>
                                            </div>
                                        </div>
                                        <div class="xu-summary-row">
                                            <div class="xu-summary-icon"><i class="fa fa-graduation-cap"></i></div>
                                            <div class="xu-summary-content">
                                                <small>Program Studi</small>
                                                <strong id="sumDept">-</strong>
                                            </div>
                                        </div>
                                        <div class="xu-summary-row">
                                            <div class="xu-summary-icon"><i class="fa fa-file-pdf-o"></i></div>
                                            <div class="xu-summary-content">
                                                <small>Dokumen</small>
                                                <strong id="sumFile">-</strong>
                                            </div>
                                        </div>
                                        <div class="xu-summary-row">
                                            <div class="xu-summary-icon"><i class="fa fa-header"></i></div>
                                            <div class="xu-summary-content">
                                                <small>Judul</small>
                                                <strong id="sumTitle">-</strong>
                                            </div>
                                        </div>
                                        <div class="xu-summary-row">
                                            <div class="xu-summary-icon"><i class="fa fa-calendar"></i></div>
                                            <div class="xu-summary-content">
                                                <small>Tahun</small>
                                                <strong id="sumYear">-</strong>
                                            </div>
                                        </div>
                                        <div class="xu-summary-row">
                                            <div class="xu-summary-icon"><i class="fa fa-bookmark"></i></div>
                                            <div class="xu-summary-content">
                                                <small>Jenis Karya</small>
                                                <strong id="sumGmd">-</strong>
                                            </div>
                                        </div>
                                        <!-- ✅ BARU: Row untuk Gate Token -->
                                        <div class="xu-summary-row">
                                            <div class="xu-summary-icon" style="background:rgba(251,191,36,0.15);color:var(--xu-gold);">
                                                <i class="fa fa-shield"></i>
                                            </div>
                                            <div class="xu-summary-content">
                                                <small>Token Similaritas</small>
                                                <strong id="sumGate" style="font-family:'JetBrains Mono',monospace;font-size:0.82rem;color:var(--xu-text-muted);">⚠ Belum diisi</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===== 🔬 PLAGIARISM GATE TOKEN ===== -->
                                    <div class="xu-gate-section">
                                        <div class="xu-gate-header">
                                            <div class="xu-gate-icon">
                                                <i class="fa fa-shield"></i>
                                            </div>
                                            <div>
                                                <h4>Gerbang Plagiarisme <span class="xu-required">*</span></h4>
                                                <p>Token ini membuktikan dokumen Anda telah lolos cek similaritas</p>
                                            </div>
                                        </div>
                                        
                                        <div class="xu-input-group">
                                            <input type="text" 
                                                   name="gate_token" 
                                                   id="gate_token" 
                                                   required
                                                   minlength="32"
                                                   maxlength="64"
                                                   value="<?= old('gate_token') ?>" 
                                                   placeholder=" "
                                                   style="font-family:'JetBrains Mono',monospace;font-size:0.85rem;letter-spacing:0.05em;">
                                            <label for="gate_token">
                                                <i class="fa fa-ticket"></i> Token Cek Similaritas <span class="xu-required">*</span>
                                            </label>
                                            <div class="xu-input-underline"></div>
                                            <div class="xu-gate-actions">
                                                <small class="xu-hint">
                                                    Belum punya token? 
                                                    <a href="<?= base_url('cek-similaritas') ?>" target="_blank" class="xu-gate-link">
                                                        <i class="fa fa-external-link"></i> Scan dokumen Anda di sini
                                                    </a>
                                                </small>
                                            </div>
                                        </div>
                                        
                                        <div class="xu-gate-status" id="gateStatus"></div>
                                    </div>

                                    <div class="xu-disclaimer">
                                        <label class="xu-checkbox">
                                            <input type="checkbox" id="agreeCheck" required>
                                            <span class="xu-checkmark"></span>
                                            <span>
                                                Saya menyatakan bahwa karya ini adalah <strong>hasil karya saya sendiri</strong>, 
                                                bebas dari plagiarisme, dan berhak untuk diunggah ke repositori DIFOSS.
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- ============ NAVIGATION BUTTONS ============ -->
                            <div class="xu-nav-buttons">
                                <button type="button" class="xu-btn xu-btn-prev" id="btnPrev" style="display:none">
                                    <i class="fa fa-arrow-left"></i> Sebelumnya
                                </button>
                                <div class="xu-nav-spacer"></div>
                                <button type="button" class="xu-btn xu-btn-next" id="btnNext">
                                    Selanjutnya <i class="fa fa-arrow-right"></i>
                                </button>
                                <button type="submit" class="xu-btn xu-btn-submit" id="btnSubmit" style="display:none">
                                    <i class="fa fa-paper-plane"></i> Kirim ke Antrian
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

                <!-- Footer Info -->
                <div class="text-center mt-4 xu-footer-info">
                    <small>
                        <i class="fa fa-shield"></i> Data Anda terenkripsi & aman · 
                        <i class="fa fa-clock-o"></i> Verifikasi 1-3 hari kerja
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Confetti Canvas -->
    <canvas id="xuConfetti" style="position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:9999;display:none"></canvas>

    <!-- Toast Container -->
    <div id="xuToastContainer" class="xu-toast-container"></div>
</div>

<style>
/* ============================================================
   ULTIMATE EXTREME DESIGN SYSTEM
   ============================================================ */
:root {
    --xu-emerald: #10b981;
    --xu-emerald-dark: #059669;
    --xu-teal: #14b8a6;
    --xu-gold: #fbbf24;
    --xu-gold-dark: #f59e0b;
    --xu-red: #e11d48;
    --xu-bg: #0a1628;
    --xu-surface: rgba(255,255,255,0.06);
    --xu-surface-hover: rgba(255,255,255,0.1);
    --xu-border: rgba(255,255,255,0.12);
    --xu-text: #ffffff;
    --xu-text-muted: rgba(255,255,255,0.65);
    --xu-glow-emerald: 0 0 40px rgba(16,185,129,0.4);
    --xu-glow-gold: 0 0 40px rgba(251,191,36,0.4);
}

.xu-ultimate-wrapper {
    min-height: 100vh;
    position: relative;
    overflow: hidden;
    font-family: 'Inter', -apple-system, system-ui, sans-serif;
}

/* ============ ANIMATED BACKGROUND ============ */
.xu-animated-bg {
    position: fixed;
    inset: 0;
    overflow: hidden;
    z-index: 0;
    background: radial-gradient(ellipse at top, #0f2847 0%, #0a1628 50%, #050d1a 100%);
}

.xu-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.4;
    animation: xu-float 20s infinite ease-in-out;
}

.xu-orb-1 {
    width: 500px; height: 500px;
    background: var(--xu-emerald);
    top: -10%; left: -10%;
}
.xu-orb-2 {
    width: 400px; height: 400px;
    background: var(--xu-gold);
    bottom: -10%; right: -10%;
    animation-delay: -7s;
}
.xu-orb-3 {
    width: 300px; height: 300px;
    background: var(--xu-teal);
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    animation-delay: -14s;
}

.xu-grid-pattern {
    position: absolute;
    inset: 0;
    background-image: 
        linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 50px 50px;
    mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%);
}

@keyframes xu-float {
    0%, 100% { transform: translate(0,0) scale(1); }
    33% { transform: translate(30px,-30px) scale(1.1); }
    66% { transform: translate(-20px,20px) scale(0.9); }
}

/* ============ ULTIMATE CARD ============ */
.xu-ultimate-card {
    position: relative;
    background: rgba(15, 30, 50, 0.7);
    border-radius: 28px;
    padding: 50px;
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 
        0 30px 80px rgba(0,0,0,0.5),
        inset 0 1px 0 rgba(255,255,255,0.1);
    overflow: hidden;
}

.xu-ultimate-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 1px;
    background: linear-gradient(90deg, 
        transparent, 
        var(--xu-emerald), 
        var(--xu-gold), 
        transparent);
    animation: xu-shimmer 3s infinite;
}

@keyframes xu-shimmer {
    0%, 100% { opacity: 0.5; }
    50% { opacity: 1; }
}

/* ============ HEADER ============ */
.xu-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: linear-gradient(135deg, rgba(16,185,129,0.2), rgba(251,191,36,0.2));
    border: 1px solid rgba(16,185,129,0.3);
    border-radius: 100px;
    color: var(--xu-gold);
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.xu-badge i {
    animation: xu-pulse 2s infinite;
}

@keyframes xu-pulse {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.2); opacity: 0.8; }
}

.xu-title {
    color: var(--xu-text);
    font-family: 'Neuton', serif;
    font-size: 3rem;
    font-weight: 700;
    margin: 16px 0 12px;
    line-height: 1.1;
}

.xu-gradient-text {
    background: linear-gradient(135deg, var(--xu-emerald) 0%, var(--xu-gold) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    position: relative;
}

.xu-subtitle {
    color: var(--xu-text-muted);
    font-size: 1.05rem;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* ============ STEPPER ============ */
.xu-stepper {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 20px 10px;
    position: relative;
}

.xu-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    flex: 0 0 auto;
    cursor: pointer;
    transition: all 0.3s;
}

.xu-step-circle {
    width: 50px; height: 50px;
    border-radius: 50%;
    background: var(--xu-surface);
    border: 2px solid var(--xu-border);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--xu-text-muted);
    font-weight: 700;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    z-index: 2;
}

.xu-step-number { transition: opacity 0.3s; }
.xu-step-check { 
    position: absolute;
    opacity: 0; 
    color: white;
    font-size: 1.2rem;
}

.xu-step-label {
    text-align: center;
    color: var(--xu-text-muted);
    font-size: 0.85rem;
}
.xu-step-label strong { display: block; color: var(--xu-text); }
.xu-step-label small { font-size: 0.7rem; }

.xu-step-line {
    flex: 1;
    height: 2px;
    background: var(--xu-border);
    margin: 25px 8px 0;
    position: relative;
    overflow: hidden;
}

.xu-step-line::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, var(--xu-emerald), var(--xu-gold));
    transform: translateX(-100%);
    transition: transform 0.5s;
}

.xu-step.active .xu-step-circle {
    background: linear-gradient(135deg, var(--xu-emerald), var(--xu-teal));
    border-color: var(--xu-emerald);
    color: white;
    box-shadow: var(--xu-glow-emerald);
    transform: scale(1.1);
}

.xu-step.completed .xu-step-circle {
    background: linear-gradient(135deg, var(--xu-gold), var(--xu-gold-dark));
    border-color: var(--xu-gold);
    box-shadow: var(--xu-glow-gold);
}

.xu-step.completed .xu-step-number { opacity: 0; }
.xu-step.completed .xu-step-check { opacity: 1; }
.xu-step.completed + .xu-step-line::before { transform: translateX(0); }

/* ============ PROGRESS BAR ============ */
.xu-progress-bar {
    height: 4px;
    background: var(--xu-surface);
    border-radius: 4px;
    overflow: hidden;
}

.xu-progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--xu-emerald), var(--xu-teal), var(--xu-gold));
    border-radius: 4px;
    transition: width 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.xu-progress-fill::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    animation: xu-progress-shimmer 2s infinite;
}

@keyframes xu-progress-shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* ============ PANELS ============ */
.xu-panel {
    display: none;
    animation: xu-slideIn 0.5s ease-out;
}

.xu-panel.active { display: block; }

@keyframes xu-slideIn {
    from { opacity: 0; transform: translateX(20px); }
    to { opacity: 1; transform: translateX(0); }
}

/* ============ SECTIONS ============ */
.xu-section {
    background: rgba(255,255,255,0.03);
    border: 1px solid var(--xu-border);
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 20px;
}

.xu-section-header {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--xu-border);
}

.xu-section-icon {
    width: 48px; height: 48px;
    border-radius: 14px;
    background: linear-gradient(135deg, rgba(16,185,129,0.2), rgba(20,184,166,0.2));
    border: 1px solid rgba(16,185,129,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--xu-emerald);
    font-size: 1.3rem;
    flex-shrink: 0;
}

.xu-section-icon-pdf { background: linear-gradient(135deg, rgba(225,29,72,0.2), rgba(251,191,36,0.2)); border-color: rgba(225,29,72,0.3); color: var(--xu-red); }
.xu-section-icon-book { background: linear-gradient(135deg, rgba(251,191,36,0.2), rgba(245,158,11,0.2)); border-color: rgba(251,191,36,0.3); color: var(--xu-gold); }
.xu-section-icon-check { background: linear-gradient(135deg, rgba(16,185,129,0.3), rgba(5,150,105,0.3)); border-color: rgba(16,185,129,0.5); color: var(--xu-emerald); }

.xu-section-header h3 {
    color: var(--xu-text);
    font-size: 1.3rem;
    margin: 0 0 4px;
    font-weight: 700;
}

.xu-section-header p { color: var(--xu-text-muted); font-size: 0.9rem; }

/* ============ FLOATING LABELS ============ */
.xu-input-group {
    position: relative;
    margin-bottom: 8px;
}

.xu-input-group input,
.xu-input-group select,
.xu-input-group textarea {
    width: 100%;
    padding: 20px 16px 8px;
    background: rgba(255,255,255,0.04);
    border: 1px solid var(--xu-border);
    border-radius: 12px;
    color: var(--xu-text);
    font-size: 1rem;
    outline: none;
    transition: all 0.3s;
    font-family: inherit;
}

.xu-input-group input:focus,
.xu-input-group select:focus,
.xu-input-group textarea:focus {
    border-color: var(--xu-emerald);
    background: rgba(16,185,129,0.05);
    box-shadow: 0 0 0 4px rgba(16,185,129,0.1);
}

.xu-input-group label {
    position: absolute;
    top: 50%;
    left: 16px;
    transform: translateY(-50%);
    color: var(--xu-text-muted);
    font-size: 1rem;
    pointer-events: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: transparent;
    padding: 0 4px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.xu-input-group label i { font-size: 0.85rem; opacity: 0.7; }

.xu-input-group textarea ~ label {
    top: 20px;
    transform: translateY(0);
}

.xu-input-group input:focus ~ label,
.xu-input-group input:not(:placeholder-shown) ~ label,
.xu-input-group select:focus ~ label,
.xu-input-group select:valid ~ label,
.xu-input-group textarea:focus ~ label,
.xu-input-group textarea:not(:placeholder-shown) ~ label {
    top: 8px;
    transform: translateY(0);
    font-size: 0.7rem;
    color: var(--xu-emerald);
    font-weight: 600;
    letter-spacing: 0.5px;
}

.xu-required { color: var(--xu-red); }

.xu-input-underline {
    position: absolute;
    bottom: 0; left: 50%;
    width: 0; height: 2px;
    background: linear-gradient(90deg, var(--xu-emerald), var(--xu-gold));
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 0 0 12px 12px;
    transform: translateX(-50%);
}

.xu-input-group input:focus ~ .xu-input-underline,
.xu-input-group select:focus ~ .xu-input-underline,
.xu-input-group textarea:focus ~ .xu-input-underline {
    width: 100%;
}

.xu-hint {
    display: block;
    color: var(--xu-text-muted);
    font-size: 0.78rem;
    margin-top: 6px;
    padding-left: 4px;
}

.xu-textarea-group textarea {
    resize: vertical;
    min-height: 140px;
    padding: 24px 16px 8px;
}

.xu-textarea-footer {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 8px;
    padding: 0 4px;
    flex-wrap: wrap;
}

.xu-word-meter {
    flex: 1;
    height: 4px;
    background: var(--xu-surface);
    border-radius: 4px;
    overflow: hidden;
    min-width: 100px;
}

.xu-word-meter-fill {
    height: 100%;
    background: var(--xu-red);
    transition: all 0.4s;
    width: 0%;
}

.xu-word-meter-fill.medium { background: var(--xu-gold); }
.xu-word-meter-fill.good { background: var(--xu-emerald); }

/* ============ DROPZONE ============ */
.xu-dropzone {
    position: relative;
    border: 2px dashed var(--xu-border);
    border-radius: 20px;
    background: rgba(255,255,255,0.02);
    padding: 40px 20px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s;
    overflow: hidden;
}

.xu-dropzone:hover {
    border-color: var(--xu-emerald);
    background: rgba(16,185,129,0.05);
    transform: translateY(-2px);
}

.xu-dropzone.dragover {
    border-color: var(--xu-gold);
    background: rgba(251,191,36,0.1);
    transform: scale(1.02);
}

.xu-dropzone.has-file {
    border-style: solid;
    border-color: var(--xu-emerald);
    padding: 20px;
    text-align: left;
}

.xu-file-input {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    z-index: 1;
}

.xu-dropzone-content .xu-dropzone-icon {
    width: 80px; height: 80px;
    margin: 0 auto 16px;
    background: linear-gradient(135deg, var(--xu-emerald), var(--xu-teal));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    box-shadow: var(--xu-glow-emerald);
    animation: xu-bounce 2s infinite;
}

@keyframes xu-bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.xu-dropzone-content h4 {
    color: var(--xu-text);
    font-size: 1.2rem;
    margin: 0 0 6px;
}

.xu-dropzone-content p {
    color: var(--xu-text-muted);
    margin: 0 0 20px;
}

.xu-dropzone-specs {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.xu-dropzone-specs span {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    background: var(--xu-surface);
    border-radius: 100px;
    color: var(--xu-text-muted);
    font-size: 0.8rem;
}

.xu-dropzone-specs i { color: var(--xu-emerald); }

/* File Preview */
.xu-file-preview {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px;
    background: var(--xu-surface);
    border-radius: 14px;
    border: 1px solid var(--xu-border);
}

.xu-file-preview-icon {
    width: 56px; height: 56px;
    background: linear-gradient(135deg, #e11d48, #be123c);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.xu-file-preview-info { flex: 1; }
.xu-file-preview-info h5 {
    color: var(--xu-text);
    margin: 0 0 4px;
    font-size: 0.95rem;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.xu-file-preview-info small { color: var(--xu-text-muted); }

.xu-file-preview-progress {
    height: 4px;
    background: var(--xu-surface);
    border-radius: 4px;
    overflow: hidden;
    margin-top: 8px;
}

.xu-file-preview-progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--xu-emerald), var(--xu-teal));
    width: 100%;
    animation: xu-progress-in 1s ease-out;
}

@keyframes xu-progress-in {
    from { width: 0; }
    to { width: 100%; }
}

.xu-file-preview-remove {
    width: 36px; height: 36px;
    border-radius: 50%;
    border: none;
    background: rgba(225,29,72,0.2);
    color: var(--xu-red);
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.xu-file-preview-remove:hover {
    background: var(--xu-red);
    color: white;
}

.xu-pdf-preview {
    margin-top: 16px;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid var(--xu-border);
}

/* ============ AI BUTTON ============ */
.xu-ai-section { padding: 4px; }

.xu-ai-button {
    width: 100%;
    padding: 0;
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(251,191,36,0.1));
    border: 1px solid rgba(16,185,129,0.3);
    border-radius: 16px;
    cursor: pointer;
    overflow: hidden;
    position: relative;
    transition: all 0.3s;
}

.xu-ai-button:disabled {
    opacity: 0.4;
    cursor: not-allowed;
}

.xu-ai-button:not(:disabled):hover {
    border-color: var(--xu-emerald);
    transform: translateY(-2px);
    box-shadow: var(--xu-glow-emerald);
}

.xu-ai-button-content {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 18px 24px;
}

.xu-ai-sparkles {
    width: 48px; height: 48px;
    background: linear-gradient(135deg, var(--xu-emerald), var(--xu-gold));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
    flex-shrink: 0;
    position: relative;
    animation: xu-sparkle 3s infinite;
}

@keyframes xu-sparkle {
    0%, 100% { box-shadow: 0 0 20px rgba(16,185,129,0.5); }
    50% { box-shadow: 0 0 30px rgba(251,191,36,0.8); }
}

.xu-ai-button-text { flex: 1; text-align: left; }
.xu-ai-button-text strong {
    display: block;
    color: var(--xu-text);
    font-size: 1.05rem;
    margin-bottom: 2px;
}
.xu-ai-button-text small { color: var(--xu-text-muted); font-size: 0.85rem; }

.xu-ai-button-arrow {
    color: var(--xu-emerald);
    font-size: 1.3rem;
    transition: transform 0.3s;
}

.xu-ai-button:not(:disabled):hover .xu-ai-button-arrow {
    transform: translateX(6px);
}

/* AI Processing */
.xu-ai-processing {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 20px;
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(251,191,36,0.1));
    border-radius: 16px;
    border: 1px solid rgba(16,185,129,0.3);
}

.xu-ai-ring {
    width: 48px; height: 48px;
    border: 3px solid var(--xu-surface);
    border-top-color: var(--xu-emerald);
    border-right-color: var(--xu-gold);
    border-radius: 50%;
    animation: xu-spin 1s linear infinite;
    flex-shrink: 0;
}

@keyframes xu-spin { to { transform: rotate(360deg); } }

.xu-ai-processing strong {
    display: block;
    color: var(--xu-text);
    margin-bottom: 2px;
}
.xu-ai-processing small { color: var(--xu-text-muted); }

/* ============ SUMMARY ============ */
.xu-summary {
    background: var(--xu-surface);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 20px;
}

.xu-summary-row {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 14px 0;
    border-bottom: 1px solid var(--xu-border);
}

.xu-summary-row:last-child { border-bottom: none; }

.xu-summary-icon {
    width: 40px; height: 40px;
    background: rgba(16,185,129,0.15);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--xu-emerald);
    flex-shrink: 0;
}

.xu-summary-content { flex: 1; }
.xu-summary-content small {
    display: block;
    color: var(--xu-text-muted);
    font-size: 0.75rem;
    margin-bottom: 2px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.xu-summary-content strong {
    color: var(--xu-text);
    font-size: 0.95rem;
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
}

.xu-disclaimer {
    padding: 16px;
    background: rgba(251,191,36,0.08);
    border: 1px solid rgba(251,191,36,0.2);
    border-radius: 12px;
}

.xu-checkbox {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    cursor: pointer;
    color: var(--xu-text);
    font-size: 0.9rem;
    line-height: 1.5;
    user-select: none;
}

.xu-checkbox input { display: none; }

.xu-checkmark {
    width: 22px; height: 22px;
    background: var(--xu-surface);
    border: 2px solid var(--xu-border);
    border-radius: 6px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.2s;
    margin-top: 2px;
}

.xu-checkbox input:checked + .xu-checkmark {
    background: linear-gradient(135deg, var(--xu-emerald), var(--xu-teal));
    border-color: var(--xu-emerald);
}

.xu-checkbox input:checked + .xu-checkmark::after {
    content: '✓';
    color: white;
    font-weight: bold;
    font-size: 0.9rem;
}

/* ============ NAV BUTTONS ============ */
.xu-nav-buttons {
    display: flex;
    gap: 12px;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid var(--xu-border);
}

.xu-nav-spacer { flex: 1; }

.xu-btn {
    padding: 14px 28px;
    border-radius: 12px;
    border: none;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s;
    position: relative;
    overflow: hidden;
}

.xu-btn-prev {
    background: var(--xu-surface);
    color: var(--xu-text);
    border: 1px solid var(--xu-border);
}
.xu-btn-prev:hover {
    background: var(--xu-surface-hover);
    transform: translateX(-4px);
}

.xu-btn-next {
    background: linear-gradient(135deg, var(--xu-emerald), var(--xu-teal));
    color: white;
    box-shadow: 0 8px 20px rgba(16,185,129,0.3);
}
.xu-btn-next:hover {
    transform: translateX(4px);
    box-shadow: 0 12px 28px rgba(16,185,129,0.5);
}

.xu-btn-submit {
    background: linear-gradient(135deg, var(--xu-gold), var(--xu-gold-dark));
    color: #1a1a1a;
    box-shadow: 0 8px 20px rgba(251,191,36,0.3);
    padding: 14px 36px;
}
.xu-btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(251,191,36,0.5);
}

.xu-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* ============ TOAST ============ */
.xu-toast-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 10000;
    display: flex;
    flex-direction: column;
    gap: 10px;
    pointer-events: none;
}

.xu-toast {
    min-width: 300px;
    max-width: 420px;
    padding: 16px 20px;
    background: rgba(15,30,50,0.95);
    backdrop-filter: blur(10px);
    border-radius: 14px;
    border: 1px solid var(--xu-border);
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--xu-text);
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    animation: xu-toastIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    pointer-events: auto;
}

.xu-toast-success { border-left: 4px solid var(--xu-emerald); }
.xu-toast-success i { color: var(--xu-emerald); font-size: 1.3rem; }

.xu-toast-error { border-left: 4px solid var(--xu-red); }
.xu-toast-error i { color: var(--xu-red); font-size: 1.3rem; }

.xu-toast-warning { border-left: 4px solid var(--xu-gold); }
.xu-toast-warning i { color: var(--xu-gold); font-size: 1.3rem; }

.xu-toast span { flex: 1; font-size: 0.92rem; }

.xu-toast-close {
    background: none;
    border: none;
    color: var(--xu-text-muted);
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0;
    line-height: 1;
}

@keyframes xu-toastIn {
    from { transform: translateX(400px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

.xu-toast-exit {
    animation: xu-toastOut 0.3s forwards;
}

@keyframes xu-toastOut {
    to { transform: translateX(400px); opacity: 0; }
}

/* ============ FOOTER ============ */
.xu-footer-info {
    color: var(--xu-text-muted);
}
.xu-footer-info i { color: var(--xu-emerald); margin: 0 4px 0 8px; }

/* ============ CHIP INPUT ============ */
.xu-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 12px;
    background: linear-gradient(135deg, rgba(16,185,129,0.2), rgba(251,191,36,0.2));
    border: 1px solid rgba(16,185,129,0.4);
    border-radius: 100px;
    color: var(--xu-text);
    font-size: 0.82rem;
    font-weight: 600;
}
.xu-chip button {
    background: none;
    border: none;
    color: var(--xu-red);
    cursor: pointer;
    padding: 0;
    font-size: 1rem;
    line-height: 1;
}
.xu-chip button:hover { color: white; background: var(--xu-red); border-radius: 50%; width: 16px; height: 16px; }

/* ============ GATE TOKEN SECTION ============ */
.xu-gate-section {
    background: linear-gradient(135deg, rgba(16,185,129,0.08), rgba(251,191,36,0.08));
    border: 1px solid rgba(16,185,129,0.3);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
}

.xu-gate-section::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--xu-emerald), var(--xu-gold));
    animation: xu-shimmer 3s infinite;
}

.xu-gate-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}

.xu-gate-icon {
    width: 40px; height: 40px;
    background: linear-gradient(135deg, var(--xu-emerald), var(--xu-gold));
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
    flex-shrink: 0;
    box-shadow: var(--xu-glow-emerald);
}

.xu-gate-header h4 {
    color: var(--xu-text);
    margin: 0 0 2px;
    font-size: 0.95rem;
    font-weight: 700;
}

.xu-gate-header p {
    color: var(--xu-text-muted);
    margin: 0;
    font-size: 0.8rem;
}

.xu-gate-actions {
    margin-top: 8px;
    padding-left: 4px;
}

.xu-gate-link {
    color: var(--xu-gold);
    text-decoration: none;
    font-weight: 700;
    transition: all 0.2s;
}

.xu-gate-link:hover {
    color: var(--xu-gold-dark);
    text-decoration: underline;
}

.xu-gate-status {
    margin-top: 10px;
    padding: 10px 14px;
    border-radius: 10px;
    font-size: 0.82rem;
    font-weight: 600;
    display: none;
    align-items: center;
    gap: 8px;
}

.xu-gate-status.valid {
    display: flex;
    background: rgba(16,185,129,0.15);
    color: var(--xu-emerald);
    border: 1px solid rgba(16,185,129,0.3);
}

.xu-gate-status.invalid {
    display: flex;
    background: rgba(225,29,72,0.15);
    color: var(--xu-red);
    border: 1px solid rgba(225,29,72,0.3);
}

/* ============ RESPONSIVE ============ */
@media (max-width: 768px) {
    .xu-ultimate-card { padding: 24px; border-radius: 20px; }
    .xu-title { font-size: 2rem; }
    .xu-stepper { padding: 10px 0; }
    .xu-step-label { display: none; }
    .xu-step-line { margin: 0 4px; }
    .xu-section { padding: 20px; }
    .xu-dropzone { padding: 30px 16px; }
    .xu-dropzone-specs { flex-direction: column; gap: 8px; }
    .xu-ai-button-content { padding: 14px 16px; }
    .xu-ai-button-text small { display: none; }
    .xu-btn { padding: 12px 20px; font-size: 0.9rem; }
}
</style>

<script>
(function() {
    'use strict';

    // ============ STATE ============
    let currentStep = 1;
    const totalSteps = 4;
    let uploadedFile = null;

    // ============ DOM REFS (Dideklarasikan HANYA SEKALI) ============
    const form = document.getElementById('formUnggah');
    const steps = document.querySelectorAll('.xu-step');
    const panels = document.querySelectorAll('.xu-panel');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');
    const btnSubmit = document.getElementById('btnSubmit');
    const progress = document.getElementById('overallProgress');
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('pdf_file');
    const filePreview = document.getElementById('filePreview');
    const dropzoneContent = document.getElementById('dropzoneContent');
    const pdfPreview = document.getElementById('pdfPreview');
    const pdfEmbed = document.getElementById('pdfEmbed');
    const btnExtract = document.getElementById('btnExtract');
    const aiProcessing = document.getElementById('aiProcessing');

    // ============ TOAST SYSTEM ============
    function showToast(message, type = 'success', duration = 4000) {
        const container = document.getElementById('xuToastContainer');
        if (!container) return;
        const toast = document.createElement('div');
        toast.className = `xu-toast xu-toast-${type}`;
        const icons = { success: 'check-circle', error: 'exclamation-circle', warning: 'exclamation-triangle' };
        toast.innerHTML = `<i class="fa fa-${icons[type]}"></i><span>${message}</span><button class="xu-toast-close">&times;</button>`;
        container.appendChild(toast);
        toast.querySelector('.xu-toast-close').onclick = () => removeToast(toast);
        setTimeout(() => removeToast(toast), duration);
    }

    function removeToast(toast) {
        if (!toast || !toast.parentNode) return;
        toast.classList.add('xu-toast-exit');
        setTimeout(() => toast.remove(), 300);
    }

    document.querySelectorAll('.xu-toast').forEach(toast => {
        const container = document.getElementById('xuToastContainer');
        if (container) {
            container.appendChild(toast);
            toast.style.position = 'relative';
            toast.style.right = 'auto';
            toast.style.top = 'auto';
            setTimeout(() => removeToast(toast), 5000);
        }
    });

    // ============ STEP NAVIGATION ============
    function goToStep(step) {
        if (step < 1 || step > totalSteps) return;
        if (step > currentStep && !validateStep(currentStep)) return;

        steps.forEach((s, i) => {
            s.classList.remove('active');
            if (i + 1 < step) s.classList.add('completed');
            else s.classList.remove('completed');
            if (i + 1 === step) s.classList.add('active');
        });

        panels.forEach(p => p.classList.remove('active'));
        const targetPanel = document.querySelector(`[data-panel="${step}"]`);
        if (targetPanel) targetPanel.classList.add('active');

        if (progress) progress.style.width = `${(step / totalSteps) * 100}%`;
        if (btnPrev) btnPrev.style.display = step === 1 ? 'none' : 'inline-flex';
        if (btnNext) btnNext.style.display = step === totalSteps ? 'none' : 'inline-flex';
        if (btnSubmit) btnSubmit.style.display = step === totalSteps ? 'inline-flex' : 'none';

        if (step === 4) populateSummary();
        currentStep = step;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    if (btnNext) btnNext.onclick = () => goToStep(currentStep + 1);
    if (btnPrev) btnPrev.onclick = () => goToStep(currentStep - 1);
    
    steps.forEach(s => {
        s.onclick = () => {
            const target = parseInt(s.dataset.step);
            if (target < currentStep || s.classList.contains('completed')) goToStep(target);
        };
    });

    // ============ VALIDATION ============
    function validateStep(step) {
        const panel = document.querySelector(`[data-panel="${step}"]`);
        if (!panel) return true;
        const inputs = panel.querySelectorAll('[required]');
        let valid = true;

        inputs.forEach(input => {
            if (!input.value || input.value.trim() === '') {
                input.style.borderColor = 'var(--xu-red)';
                valid = false;
                setTimeout(() => { input.style.borderColor = ''; }, 2000);
            } else {
                input.style.borderColor = 'var(--xu-emerald)';
                setTimeout(() => { input.style.borderColor = ''; }, 1500);
            }
        });

        if (!valid) {
            showToast('Mohon lengkapi semua field yang wajib diisi', 'error');
            return false;
        }
        if (step === 2 && !uploadedFile) {
            showToast('Silakan upload file PDF terlebih dahulu', 'error');
            return false;
        }
        if (step === 3) {
            const notesEl = document.getElementById('notes');
            if (notesEl && countWords(notesEl.value) < 50) {
                showToast(`Abstrak minimal 50 kata`, 'warning');
                return false;
            }
        }

        // ===== ✅ VALIDASI BARU: GATE TOKEN (STEP 4) =====
        if (step === 4) {
            const gateEl = document.getElementById('gate_token');
            
            // Cek 1: Token wajib diisi
            if (!gateEl || !gateEl.value || gateEl.value.trim().length === 0) {
                showToast('Token cek similaritas wajib diisi. Scan dokumen Anda di halaman Cek Similaritas terlebih dahulu.', 'error', 6000);
                if (gateEl) gateEl.focus();
                return false;
            }
            
            // Cek 2: Panjang minimal 32 karakter
            const tokenVal = gateEl.value.trim();
            if (tokenVal.length < 32) {
                showToast(`Token terlalu pendek (${tokenVal.length}/32 karakter). Pastikan Anda menyalin token lengkap.`, 'error', 5000);
                gateEl.focus();
                return false;
            }
            
            // Cek 3: Format harus hex alphanumeric (a-f, 0-9)
            if (!/^[a-f0-9]{32,64}$/i.test(tokenVal)) {
                showToast('Format token tidak valid. Token harus terdiri dari karakter hex (0-9, a-f).', 'error', 5000);
                gateEl.focus();
                return false;
            }
        }

        return true;
    }

    // ============ FILE UPLOAD & DRAG-DROP ============
    if (fileInput) {
        fileInput.onchange = (e) => {
            if (e.target.files && e.target.files.length > 0) handleFile(e.target.files[0]);
        };
    }
    
    if (dropzone) {
        dropzone.onclick = (e) => {
            if (e.target === dropzone || e.target.classList.contains('xu-dropzone-content')) {
                if (fileInput) fileInput.click();
            }
        };

        ['dragover', 'dragenter'].forEach(evt => {
            dropzone.addEventListener(evt, (e) => { e.preventDefault(); dropzone.classList.add('dragover'); });
        });
        ['dragleave', 'drop'].forEach(evt => {
            dropzone.addEventListener(evt, (e) => { e.preventDefault(); dropzone.classList.remove('dragover'); });
        });
        dropzone.addEventListener('drop', (e) => {
            if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files.length > 0) {
                handleFile(e.dataTransfer.files[0]);
            }
        });
    }

    function handleFile(file) {
        if (!file) return;
        
        // ✅ SAFE CHECK: Pastikan name dan type ada sebelum toLowerCase (Mencegah error undefined)
        const fileName = file.name || 'dokumen.pdf';
        const fileType = file.type || '';
        const isPdf = fileType === 'application/pdf' || (fileName || '').toLowerCase().endsWith('.pdf');
        
        if (!isPdf) {
            showToast('Hanya file PDF yang diperbolehkan', 'error');
            return;
        }
        if (file.size > 20 * 1024 * 1024) {
            showToast('Ukuran file maksimal 20MB', 'error');
            return;
        }

        uploadedFile = file;
        
        const fileNameEl = document.getElementById('fileName');
        const fileSizeEl = document.getElementById('fileSize');
        if (fileNameEl) fileNameEl.textContent = fileName;
        if (fileSizeEl) fileSizeEl.textContent = formatSize(file.size);
        
        if (dropzoneContent) dropzoneContent.style.display = 'none';
        if (filePreview) filePreview.style.display = 'flex';
        if (dropzone) dropzone.classList.add('has-file');
        if (btnExtract) btnExtract.disabled = false;

        const reader = new FileReader();
        reader.onload = (e) => {
            if (pdfEmbed) {
                pdfEmbed.src = e.target.result;
                if (pdfPreview) pdfPreview.style.display = 'block';
            }
        };
        reader.readAsDataURL(file);
        showToast(`File "${fileName}" berhasil dipilih`, 'success');
    }

    const removeFileBtn = document.getElementById('removeFile');
    if (removeFileBtn) {
        removeFileBtn.onclick = (e) => {
            e.stopPropagation();
            uploadedFile = null;
            if (fileInput) fileInput.value = '';
            if (dropzoneContent) dropzoneContent.style.display = 'block';
            if (filePreview) filePreview.style.display = 'none';
            if (pdfPreview) pdfPreview.style.display = 'none';
            if (dropzone) dropzone.classList.remove('has-file');
            if (btnExtract) btnExtract.disabled = true;
            showToast('File dihapus', 'warning');
        };
    }

    function formatSize(bytes) {
        if (!bytes) return '0 B';
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
    }

    // ============ CHIP INPUT SYSTEM ============
    const chipInputs = {
        authors: { input: null, container: null, hidden: null, values: [] },
        supervisors: { input: null, container: null, hidden: null, values: [] },
        examiners: { input: null, container: null, hidden: null, values: [] },
        topics: { input: null, container: null, hidden: null, values: [] }
    };

    function initChipInput(key) {
        const cfg = chipInputs[key];
        cfg.input = document.getElementById(key + '_input');
        cfg.container = document.getElementById(key + '_chips');
        cfg.hidden = document.getElementById(key + '_text');
        if (!cfg.input || !cfg.container) return;

        cfg.input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && cfg.input.value.trim()) {
                e.preventDefault();
                addChip(key, cfg.input.value.trim());
                cfg.input.value = '';
            }
        });
    }

    function addChip(key, value) {
        const cfg = chipInputs[key];
        if (!value || cfg.values.includes(value)) return;
        cfg.values.push(value);
        const chip = document.createElement('span');
        chip.className = 'xu-chip';
        chip.innerHTML = `${value} <button type="button">&times;</button>`;
        chip.querySelector('button').onclick = () => {
            cfg.values = cfg.values.filter(v => v !== value);
            chip.remove();
            updateHidden(key);
        };
        cfg.container.appendChild(chip);
        updateHidden(key);
    }

    function setChips(key, array) {
        const cfg = chipInputs[key];
        if (!cfg.container || !Array.isArray(array)) return;
        cfg.container.innerHTML = '';
        cfg.values = [];
        array.forEach(v => addChip(key, v));
    }

    function updateHidden(key) {
        const cfg = chipInputs[key];
        if (cfg.hidden) cfg.hidden.value = cfg.values.join('|||');
    }

    Object.keys(chipInputs).forEach(initChipInput);

    // ============ AI EXTRACTION (DIPERLUAS) ============
    if (btnExtract) {
        btnExtract.onclick = async (e) => {
            e.preventDefault();
            if (!uploadedFile) {
                showToast('Silakan pilih file PDF terlebih dahulu', 'warning');
                return;
            }

            const originalText = btnExtract.innerHTML;
            btnExtract.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Mengekstrak...';
            btnExtract.disabled = true;
            if (aiProcessing) aiProcessing.style.display = 'flex';

            const formData = new FormData();
            formData.append('pdf_file', uploadedFile);
            formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

            try {
                const response = await fetch('<?= base_url('submission/extract-ai') ?>', {
                    method: 'POST',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    body: formData
                });
                
                const result = await response.json();
                if (result.ok || result.success) {
                    const d = result.data || result;
                    let filled = [];

                    // Helper isi field
                    function setVal(id, val) {
                        const el = document.getElementById(id);
                        if (el && val) { el.value = val; filled.push(id); return true; }
                        return false;
                    }

                    // ✅ ISI FIELD DASAR
                    if (setVal('title', d.title)) filled.push('Judul');
                    if (setVal('publish_year', d.publish_year)) filled.push('Tahun');
                    if (setVal('notes', d.notes)) { filled.push('Abstrak'); updateWordCount(); }
                    if (setVal('notes_en', d.notes_en)) filled.push('Abstrak Inggris');
                    if (setVal('student_id_meta', d.student_id)) filled.push('NIM');
                    if (setVal('cp_email', d.email)) filled.push('Email');
                    if (setVal('departement', d.department)) filled.push('Departemen');
                    if (setVal('publisher', d.publisher)) filled.push('Penerbit');
                    if (setVal('place', d.place)) filled.push('Kota');
                    if (setVal('collation', d.collation)) filled.push('Kolasi');
                    if (setVal('class', d.classification)) filled.push('Klasifikasi');
                    if (setVal('callNumber', d.call_number)) filled.push('Call Number');

                    // ✅ ISI DROPDOWN GMD
                    if (d.gmd) {
                        const gmdEl = document.getElementById('gmd');
                        if (gmdEl) { gmdEl.value = String(d.gmd); filled.push('Jenis Karya'); }
                    }
                    if (d.language) {
                        const langEl = document.getElementById('language');
                        if (langEl) { langEl.value = d.language.toLowerCase(); filled.push('Bahasa'); }
                    }

                    // ✅ ISI CHIP INPUTS
                    if (Array.isArray(d.authors) && d.authors.length) { setChips('authors', d.authors); filled.push('Penulis'); }
                    if (Array.isArray(d.supervisors) && d.supervisors.length) { setChips('supervisors', d.supervisors); filled.push('Pembimbing'); }
                    if (Array.isArray(d.examiners) && d.examiners.length) { setChips('examiners', d.examiners); filled.push('Penguji'); }
                    if (Array.isArray(d.subjects) && d.subjects.length) { setChips('topics', d.subjects); filled.push('Subyek'); }

                    // Sinkronisasi student_id ke step 1
                    const sid1 = document.getElementById('student_id');
                    const sid3 = document.getElementById('student_id_meta');
                    if (sid1 && sid3 && sid3.value) sid1.value = sid3.value;
                    if (sid3 && sid1 && sid1.value) sid3.value = sid1.value;

                    showToast(`✅ ${filled.length} field berhasil diisi!`, 'success', 5000);
                } else {
                    showToast(result.error || 'Gagal mengekstrak metadata.', 'error');
                }
            } catch (error) {
                console.error("AI Extraction Error:", error);
                showToast(error.message || 'Gagal terhubung ke server AI.', 'error');
            } finally {
                btnExtract.innerHTML = originalText;
                btnExtract.disabled = false;
                if (aiProcessing) aiProcessing.style.display = 'none';
            }
        };
    }

    // ============ TOMBOL TERJEMAHKAN ABSTRAK ============
    const btnTranslate = document.getElementById('btnTranslate');
    if (btnTranslate) {
        btnTranslate.onclick = async () => {
            const src = document.getElementById('notes').value.trim();
            const out = document.getElementById('notes_en');
            if (!src) { showToast('Isi abstrak Indonesia dulu', 'warning'); return; }
            btnTranslate.disabled = true;
            btnTranslate.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Menerjemahkan...';
            try {
                const r = await fetch('https://translate.googleapis.com/translate_a/single?client=gtx&sl=id&tl=en&dt=t&q=' + encodeURIComponent(src.substring(0, 5000)));
                const j = await r.json();
                let s = '';
                if (Array.isArray(j) && Array.isArray(j[0])) j[0].forEach(g => { if (g && g[0]) s += g[0]; });
                if (s) out.value = s.trim();
                showToast('Abstrak Inggris berhasil diterjemahkan!', 'success');
            } catch(e) {
                showToast('Gagal menerjemahkan', 'error');
            }
            btnTranslate.disabled = false;
            btnTranslate.innerHTML = '<i class="fa fa-magic"></i> Terjemahkan Otomatis';
        };
    }

    // Sinkronisasi student_id antar step
    ['student_id', 'student_id_meta'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', () => {
            const other = document.getElementById(id === 'student_id' ? 'student_id_meta' : 'student_id');
            if (other) other.value = el.value;
        });
    });

    // ============ REAL-TIME COUNTERS ============
    const titleInput = document.getElementById('title');
    const titleCount = document.getElementById('titleCount');
    if (titleInput && titleCount) {
        titleInput.oninput = () => {
            titleCount.textContent = titleInput.value.length;
            titleCount.style.color = titleInput.value.length >= 10 ? 'var(--xu-emerald)' : 'var(--xu-red)';
        };
    }

    const notesInput = document.getElementById('notes');
    function countWords(str) {
        if (!str) return 0;
        return str.trim().split(/\s+/).filter(w => w.length > 0).length;
    }
    function updateWordCount() {
        if (!notesInput) return;
        const text = notesInput.value;
        const words = countWords(text);
        const wordCountEl = document.getElementById('wordCount');
        const charCountEl = document.getElementById('charCount');
        const meter = document.getElementById('wordMeter');
        
        if (wordCountEl) wordCountEl.textContent = words;
        if (charCountEl) charCountEl.textContent = text.length;
        if (meter) {
            meter.style.width = Math.min(100, (words / 100) * 100) + '%';
            meter.className = 'xu-word-meter-fill' + (words >= 100 ? ' good' : (words >= 50 ? ' medium' : ''));
        }
    }
    if (notesInput) notesInput.oninput = updateWordCount;

    // ============ SUMMARY ============
    function populateSummary() {
        const els = {
            sumName: 'student_name', sumId: 'student_id', sumDept: 'departement',
            sumTitle: 'title', sumYear: 'publish_year'
        };
        for (const [sumId, inputId] of Object.entries(els)) {
            const sumEl = document.getElementById(sumId);
            const inEl = document.getElementById(inputId);
            if (sumEl && inEl) sumEl.textContent = inEl.value || '-';
        }
        const sumFile = document.getElementById('sumFile');
        if (sumFile) sumFile.textContent = uploadedFile ? uploadedFile.name : '-';
        
        const sumGmd = document.getElementById('sumGmd');
        const gmdSelect = document.getElementById('gmd');
        if (sumGmd && gmdSelect) sumGmd.textContent = gmdSelect.options[gmdSelect.selectedIndex]?.text || '-';
    }

    // ============ SUBMIT & CONFETTI ============
    if (form) {
        form.onsubmit = (e) => {
            const agreeCheck = document.getElementById('agreeCheck');
            if (agreeCheck && !agreeCheck.checked) {
                e.preventDefault();
                showToast('Anda harus menyetujui pernyataan karya asli', 'error');
                return false;
            }
            if (btnSubmit) {
                btnSubmit.disabled = true;
                btnSubmit.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Mengirim...';
            }
            setTimeout(launchConfetti, 500);
        };
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && !e.shiftKey && document.activeElement.tagName !== 'TEXTAREA') {
            e.preventDefault();
            if (currentStep < totalSteps && btnNext) btnNext.click();
            else if (btnSubmit) btnSubmit.click();
        }
    });

    // ============ AUTO-SAVE DRAFT ============
    const draftKey = 'xu_unggah_draft';
    const draftFields = ['student_name', 'student_id', 'departement', 'title', 'publish_year', 'notes'];
    
    function saveDraft() {
        const draft = {};
        draftFields.forEach(f => { const el = document.getElementById(f); if (el) draft[f] = el.value; });
        const gmdEl = document.getElementById('gmd');
        if (gmdEl) draft.gmd = gmdEl.value;
        try { localStorage.setItem(draftKey, JSON.stringify(draft)); } catch(e) {}
    }
    function loadDraft() {
        try {
            const draft = JSON.parse(localStorage.getItem(draftKey));
            if (!draft) return;
            draftFields.forEach(f => { const el = document.getElementById(f); if (el && draft[f]) el.value = draft[f]; });
            const gmdEl = document.getElementById('gmd');
            if (gmdEl && draft.gmd) gmdEl.value = draft.gmd;
            updateWordCount();
        } catch(e) {}
    }
    draftFields.concat(['gmd']).forEach(f => {
        const el = document.getElementById(f);
        if (el) el.oninput = saveDraft;
    });
    loadDraft();

    function launchConfetti() {
        const canvas = document.getElementById('xuConfetti');
        if (!canvas) return;
        canvas.style.display = 'block';
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        const particles = [], colors = ['#10b981', '#fbbf24', '#14b8a6', '#f59e0b', '#ffffff'];
        for (let i = 0; i < 150; i++) {
            particles.push({
                x: canvas.width / 2, y: canvas.height / 2,
                vx: (Math.random() - 0.5) * 15, vy: (Math.random() - 0.5) * 15 - 5,
                size: Math.random() * 8 + 4, color: colors[Math.floor(Math.random() * colors.length)],
                rotation: Math.random() * 360, rotSpeed: (Math.random() - 0.5) * 10, life: 1
            });
        }
        let frame = 0;
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.x += p.vx; p.y += p.vy; p.vy += 0.3; p.rotation += p.rotSpeed; p.life -= 0.005;
                if (p.life > 0) {
                    ctx.save(); ctx.translate(p.x, p.y); ctx.rotate(p.rotation * Math.PI / 180);
                    ctx.fillStyle = p.color; ctx.globalAlpha = p.life;
                    ctx.fillRect(-p.size/2, -p.size/2, p.size, p.size); ctx.restore();
                }
            });
            if (++frame < 200) requestAnimationFrame(animate);
            else { canvas.style.display = 'none'; ctx.clearRect(0, 0, canvas.width, canvas.height); }
        }
        animate();
    }

    // ============ GATE TOKEN: REAL-TIME VALIDATION ============
    const gateInput = document.getElementById('gate_token');
    const gateStatus = document.getElementById('gateStatus');

    if (gateInput && gateStatus) {
        gateInput.addEventListener('input', function() {
            const val = this.value.trim();
            gateStatus.className = 'xu-gate-status';
            
            if (!val) {
                gateStatus.style.display = 'none';
                return;
            }
            
            if (val.length < 32) {
                gateStatus.className = 'xu-gate-status invalid';
                gateStatus.innerHTML = '<i class="fa fa-info-circle"></i> Token terlalu pendek (' + val.length + '/32 karakter)';
            } else if (!/^[a-f0-9]{32,64}$/i.test(val)) {
                gateStatus.className = 'xu-gate-status invalid';
                gateStatus.innerHTML = '<i class="fa fa-exclamation-triangle"></i> Format token tidak valid (harus karakter hex)';
            } else {
                gateStatus.className = 'xu-gate-status valid';
                gateStatus.innerHTML = '<i class="fa fa-check-circle"></i> Format token valid — akan diverifikasi saat submit';
            }
            
            // Update summary juga
            const sumGate = document.getElementById('sumGate');
            if (sumGate) {
                if (!val) {
                    sumGate.textContent = '⚠ Belum diisi';
                    sumGate.style.color = 'var(--xu-text-muted)';
                } else if (val.length < 32 || !/^[a-f0-9]{32,64}$/i.test(val)) {
                    sumGate.textContent = '⚠ Format salah';
                    sumGate.style.color = 'var(--xu-red)';
                } else {
                    sumGate.textContent = '✓ ' + val.substring(0, 8) + '... (' + val.length + ' char)';
                    sumGate.style.color = 'var(--xu-emerald)';
                }
            }
        });
    }


    // Init
    const initTitle = document.getElementById('title');
    if (initTitle) {
        const initTitleCount = document.getElementById('titleCount');
        if (initTitleCount) initTitleCount.textContent = (initTitle.value || '').length;
    }
    updateWordCount();
})();
</script>