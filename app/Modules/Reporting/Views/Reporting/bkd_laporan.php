<div class="container-fluid py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class="fa fa-users"></i> Laporan BKD Dosen - Semester <?= $semester ?></h3>
                <form method="get" class="d-flex gap-2">
                    <select name="semester" class="form-select" onchange="this.form.submit()">
                        <?php foreach ($semesters as $s): ?>
                            <option value="<?= $s ?>" <?= $s == $semester ? 'selected' : '' ?>>
                                <?= substr($s, 0, 4) ?> - <?= substr($s, 4) == 1 ? 'Ganjil' : 'Genap' ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('bkd/generate') ?>" class="mb-3">
                <input type="hidden" name="semester" value="<?= $semester ?>">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-refresh"></i> Generate Ulang Laporan
                </button>
                <a href="<?= base_url('bkd/export/xlsx?semester=' . $semester) ?>" class="btn btn-success">
                    <i class="fa fa-file-excel-o"></i> Export Excel
                </a>
            </form>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th class="text-center">Bimbingan</th>
                            <th class="text-center">Penguji</th>
                            <th class="text-center">SKS Bimbingan</th>
                            <th class="text-center">SKS Penguji</th>
                            <th class="text-center fw-bold">Total SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($reports as $r): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($r->supervisor_name) ?></td>
                            <td class="text-center"><?= $r->total_pembimbing ?></td>
                            <td class="text-center"><?= $r->total_penguji ?></td>
                            <td class="text-center"><?= number_format($r->sks_pembimbing, 2) ?></td>
                            <td class="text-center"><?= number_format($r->sks_penguji, 2) ?></td>
                            <td class="text-center fw-bold" style="color: <?= $r->total_sks >= 12 ? '#059669' : '#ef4444' ?>;">
                                <?= number_format($r->total_sks, 2) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>