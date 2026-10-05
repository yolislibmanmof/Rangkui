<!-- 
    File: app/Modules/Submission/Views/success_public.php
    Catatan: Tidak ada tag <html>, <head>, atau <body> karena sudah diurus oleh v_beranda.php
-->

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div style="background: rgba(255,255,255,0.08); border-radius: 20px; padding: 60px 40px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 20px 60px rgba(0,0,0,0.3); text-align: center;">
                
                <!-- Ikon Sukses -->
                <div style="width: 100px; height: 100px; background: linear-gradient(135deg, var(--xl-emerald, #059669), var(--xl-teal, #0891b2)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px; box-shadow: 0 10px 30px rgba(5,150,105,0.4);">
                    <i class="fa fa-check" style="font-size: 3rem; color: #fff;"></i>
                </div>

                <!-- Teks Utama -->
                <h2 style="color: #fff; font-family: 'Neuton', serif; font-size: 2.2rem; margin-bottom: 15px;">
                    Unggahan Berhasil Dikirim!
                </h2>
                
                <p style="color: rgba(255,255,255,0.8); font-size: 1.1rem; margin-bottom: 30px; line-height: 1.6;">
                    Terima kasih telah berkontribusi. Dokumen Anda saat ini berada di <strong style="color: var(--xl-gold, #f59e0b);">antrian verifikasi admin</strong>. 
                    <br>Dokumen akan otomatis muncul di pencarian publik setelah disetujui.
                </p>

                <!-- Tombol Aksi -->
                <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?= base_url() ?>" 
                       style="padding: 14px 30px; background: rgba(255,255,255,0.1); color: #fff; border: 1px solid rgba(255,255,255,0.2); border-radius: 10px; text-decoration: none; font-weight: 700; transition: all 0.3s; display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa fa-home"></i> Kembali ke Beranda
                    </a>
                    <a href="<?= base_url('unggah') ?>" 
                       style="padding: 14px 30px; background: linear-gradient(90deg, var(--xl-emerald, #059669), var(--xl-teal, #0891b2)); color: #fff; border-radius: 10px; text-decoration: none; font-weight: 700; box-shadow: 0 8px 20px rgba(5,150,105,0.3); transition: all 0.3s; display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa fa-cloud-upload"></i> Unggah Karya Lainnya
                    </a>
                </div>

            </div>
            
        </div>
    </div>
</div>