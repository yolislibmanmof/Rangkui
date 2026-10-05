<style>
/* ================================================================
   DIFOSS ADD/UPDATE MEMBERSHIP TYPE — EMERALD FOREST EDITION
   ================================================================ */
:root{
    --ty-emerald:#059669; --ty-teal:#0891b2; --ty-gold:#f59e0b;
    --ty-mint:#6ee7b7; --ty-deep:#0a2920;
    --ty-ink:#0f172a; --ty-muted:#64748b; --ty-soft:#94a3b8;
}

.xuR{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.2,.8,.2,1)}
.xuR.in{opacity:1;transform:none}

.xuMtCard{
    background:#fff;border-radius:22px;
    box-shadow:0 16px 44px rgba(15,23,42,.08);
    overflow:hidden;
    border:1px solid rgba(5,150,105,.12);
    margin-bottom:24px;
    transition:.35s cubic-bezier(.2,.8,.2,1);
}
.xuMtCard:hover{box-shadow:0 22px 54px rgba(5,150,105,.14);border-color:rgba(5,150,105,.22)}
html.xu-dark .xuMtCard{background:#0f1e1f;border-color:rgba(5,150,105,.22);box-shadow:0 16px 44px rgba(0,0,0,.4)}

.xuMtHead{
    padding:24px 28px;
    background:linear-gradient(90deg,var(--ty-emerald),var(--ty-teal),var(--ty-gold),var(--ty-emerald));
    background-size:200% 100%;
    color:#fff;
    animation:xuTyGrad 7s linear infinite;
    position:relative;overflow:hidden;
}
.xuMtHead::after{
    content:'';position:absolute;top:-60%;right:-8%;
    width:320px;height:320px;border-radius:50%;
    background:radial-gradient(circle,rgba(245,158,11,.25),transparent 70%);
    pointer-events:none;
}
@keyframes xuTyGrad{to{background-position:200% 0}}

.xuMtHead h2{
    margin:0;font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.35rem;
    display:flex;align-items:center;gap:12px;
    color:#fff;letter-spacing:-.01em;
    position:relative;z-index:2;
}
.xuMtHead h2 i{
    width:42px;height:42px;border-radius:13px;
    background:rgba(255,255,255,.18);
    backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:1.15rem;
    box-shadow:inset 0 1px 0 rgba(255,255,255,.2);
}

.xuMtBody{padding:30px 32px}

.xuSec{
    font-family:'Neuton',Georgia,serif;
    font-weight:700;font-size:1.05rem;
    color:var(--ty-ink);
    margin:0 0 18px;
    display:flex;align-items:center;gap:10px;
    padding-bottom:12px;
    border-bottom:1.5px dashed rgba(5,150,105,.25);
}
html.xu-dark .xuSec{color:#f1f5f9;border-bottom-color:rgba(5,150,105,.35)}

.xuSec i{
    width:32px;height:32px;border-radius:10px;
    background:linear-gradient(135deg,rgba(5,150,105,.12),rgba(245,158,11,.08));
    color:var(--ty-emerald);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.88rem;
    border:1px solid rgba(5,150,105,.2);
}
html.xu-dark .xuSec i{color:var(--ty-mint);background:linear-gradient(135deg,rgba(5,150,105,.2),rgba(245,158,11,.12));border-color:rgba(5,150,105,.35)}

.xuMtBody .xuSec + .xuGrid{margin-bottom:26px}

.xuGrid{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:26px}
@media (max-width:800px){.xuGrid{grid-template-columns:1fr}}

.xuMtBody label.control-label{
    font-weight:800;font-size:.74rem;
    color:var(--ty-ink);margin-bottom:8px;display:block;
    text-transform:uppercase;letter-spacing:.08em;
}
html.xu-dark .xuMtBody label.control-label{color:#e2e8f0}

.xuMtBody .form-control{
    width:100%;padding:12px 15px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;font-size:.9rem;
    outline:none;background:#f8fafc;
    color:var(--ty-ink);
    font-family:inherit;
    box-sizing:border-box;
    transition:.25s;
}
.xuMtBody .form-control:hover{
    border-color:var(--ty-emerald);
    background:rgba(5,150,105,.04);
}
.xuMtBody .form-control:focus{
    border-color:var(--ty-emerald);
    background:#fff;
    box-shadow:0 0 0 4px rgba(5,150,105,.12);
}
html.xu-dark .xuMtBody .form-control{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:#f1f5f9}
html.xu-dark .xuMtBody .form-control:hover{background:rgba(5,150,105,.08)}
html.xu-dark .xuMtBody .form-control:focus{border-color:var(--ty-gold);background:rgba(255,255,255,.08);box-shadow:0 0 0 4px rgba(245,158,11,.15)}

.xuRadio{display:flex;gap:12px;flex-wrap:wrap}
.xuRadio label{
    display:inline-flex;align-items:center;gap:9px;
    padding:10px 18px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;
    background:#f8fafc;
    cursor:pointer;transition:.25s;
    font-weight:700!important;color:var(--ty-muted);
    font-size:.85rem;margin:0;
}
.xuRadio label:hover{
    border-color:var(--ty-emerald);
    background:rgba(5,150,105,.04);
    color:var(--ty-emerald);
}
.xuRadio label:has(input:checked){
    border-color:var(--ty-emerald);
    background:linear-gradient(135deg,rgba(5,150,105,.1),rgba(245,158,11,.05));
    color:var(--ty-emerald);
    box-shadow:0 6px 16px rgba(5,150,105,.15);
}
.xuRadio input{
    width:18px;height:18px;
    accent-color:var(--ty-emerald);
    cursor:pointer;margin:0;
}
html.xu-dark .xuRadio label{background:rgba(255,255,255,.05);border-color:rgba(5,150,105,.25);color:var(--ty-soft)}
html.xu-dark .xuRadio label:hover{border-color:var(--ty-gold);color:var(--ty-mint)}
html.xu-dark .xuRadio label:has(input:checked){
    border-color:var(--ty-gold);
    background:linear-gradient(135deg,rgba(5,150,105,.15),rgba(245,158,11,.08));
    color:var(--ty-mint);
}

.xuFormFoot{
    padding:22px 32px;
    border-top:1.5px dashed rgba(5,150,105,.15);
    background:linear-gradient(135deg,rgba(5,150,105,.03),rgba(245,158,11,.02));
    display:flex;justify-content:flex-end;gap:10px;flex-wrap:wrap;
}
html.xu-dark .xuFormFoot{border-top-color:rgba(5,150,105,.25);background:linear-gradient(135deg,rgba(5,150,105,.06),rgba(245,158,11,.03))}

.xuBtnCancel{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 24px;border-radius:12px;
    background:rgba(5,150,105,.08);
    color:var(--ty-emerald);
    font-weight:700;font-size:.88rem;
    text-decoration:none;transition:.25s;
    border:1.5px solid rgba(5,150,105,.25);
    font-family:inherit;
}
.xuBtnCancel:hover{
    background:rgba(5,150,105,.14);
    border-color:rgba(5,150,105,.4);
    transform:translateY(-2px);
    text-decoration:none;color:var(--ty-emerald);
}
html.xu-dark .xuBtnCancel{background:rgba(5,150,105,.12);color:var(--ty-mint);border-color:rgba(5,150,105,.3)}
html.xu-dark .xuBtnCancel:hover{background:rgba(5,150,105,.18);border-color:rgba(245,158,11,.4)}

.xuBtnSave{
    display:inline-flex;align-items:center;gap:8px;
    padding:11px 28px;border-radius:12px;
    background:linear-gradient(90deg,var(--ty-emerald),var(--ty-gold));
    color:#fff;border:none;
    font-weight:800;font-size:.9rem;
    letter-spacing:.03em;
    cursor:pointer;transition:.25s;
    box-shadow:0 10px 26px rgba(5,150,105,.35);
    position:relative;overflow:hidden;
    font-family:inherit;
}
.xuBtnSave::before{
    content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;
    background:linear-gradient(100deg,transparent 20%,rgba(255,255,255,.3) 50%,transparent 80%);
    transition:left .6s ease;
}
.xuBtnSave:hover{
    transform:translateY(-2px);
    filter:brightness(1.08);
    box-shadow:0 14px 32px rgba(5,150,105,.45);
}
.xuBtnSave:hover::before{left:120%}

@media(max-width:640px){
    .xuMtBody{padding:22px 18px}
    .xuFormFoot{padding:18px;flex-direction:column}
    .xuBtnSave,.xuBtnCancel{width:100%;justify-content:center}
}
</style>

<div class="xuMtCard xuR">
    <div class="xuMtHead">
        <h2><i class="fa fa-pencil-square"></i> Update Membership Type</h2>
    </div>

    <div class="xuMtBody">
        <form name="mainForm" id="mainForm" class="simbio_form_maker" method="post" action="<?= base_url('membership/updatetype') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="xuSec"><i class="fa fa-id-badge"></i> Informasi Tipe</div>
            <div class="xuGrid">
                <div>
                    <label for="memberTypeName" class="control-label">Membership Type*</label>
                    <input type="hidden" name="member_type_id" value="<?= $data->member_type_id ?>">
                    <input type="text" name="member_type_name" id="memberTypeName" class="form-control" value="<?= $data->member_type_name ?>" maxlength="256">
                </div>
                <div>
                    <label for="memberPeriode" class="control-label">Membership Duration (In Days)</label>
                    <input type="text" name="member_periode" id="memberPeriode" class="form-control" value="<?= $data->member_periode ?>" maxlength="256">
                </div>
            </div>

            <div class="xuSec"><i class="fa fa-book"></i> Aturan Peminjaman</div>
            <div class="xuGrid">
                <div>
                    <label for="loanLimit" class="control-label">Loan Amount</label>
                    <input type="text" name="loan_limit" id="loanLimit" class="form-control" value="<?= $data->loan_limit ?>" maxlength="256">
                </div>
                <div>
                    <label for="loanPeriode" class="control-label">Lama Peminjaman (Dalam Hari)</label>
                    <input type="text" name="loan_periode" id="loanPeriode" class="form-control" value="<?= $data->loan_periode ?>" maxlength="256">
                </div>
                <div>
                    <label for="reborrowLimit" class="control-label">Number of Renewals</label>
                    <input type="text" name="reborrow_limit" id="reborrowLimit" class="form-control" value="<?= $data->reborrow_limit ?>" maxlength="256">
                </div>
                <div>
                    <label for="fineEachDay" class="control-label">Daily Fine</label>
                    <input type="text" name="fine_each_day" id="fineEachDay" class="form-control" value="<?= $data->fine_each_day ?>" maxlength="256">
                </div>
                <div>
                    <label for="gracePeriode" class="control-label">Late Tolerance</label>
                    <input type="text" name="grace_periode" id="gracePeriode" class="form-control" value="<?= $data->grace_periode ?>" maxlength="256">
                </div>
            </div>

            <div class="xuSec"><i class="fa fa-calendar-check-o"></i> Reservasi</div>
            <div class="xuGrid">
                <div>
                    <label class="control-label">Reservation</label>
                    <div class="xuRadio">
                        <label><input type="radio" name="enable_reserve" value="1" <?= $data->enable_reserve == 1 ? 'checked' : '' ?>> Possible</label>
                        <label><input type="radio" name="enable_reserve" value="0" <?= $data->enable_reserve == 0 ? 'checked' : '' ?>> Impossible</label>
                    </div>
                </div>
                <div>
                    <label for="reserveLimit" class="control-label">Reservation Mount</label>
                    <input type="text" name="reserve_limit" id="reserveLimit" class="form-control" value="<?= $data->reserve_limit ?>" maxlength="256">
                </div>
            </div>

            <div class="xuFormFoot">
                <a href="javascript:void(0)" onclick="if(window.history.length>1){window.history.back();}else{location.href='<?= base_url('membership') ?>';}" class="xuBtnCancel">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <input type="submit" class="xuBtnSave" name="saveData" value="Update">
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var io = new IntersectionObserver(function(es){
        es.forEach(function(en){
            if (en.isIntersecting){ en.target.classList.add('in'); io.unobserve(en.target); }
        });
    }, {threshold:.06});
    document.querySelectorAll('.xuR').forEach(function(el){ io.observe(el); });
});
</script>