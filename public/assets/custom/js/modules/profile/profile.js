(function (window, $) {
    'use strict';

    if (!$) {
        console.error('Rangkui Profile: jQuery belum tersedia; periksa urutan script pada template.');
        return;
    }

    function parseSocialMedia(value) {
        if (value && typeof value === 'object') return value;
        if (typeof value === 'string') {
            try {
                const parsed = JSON.parse(value);
                return parsed && typeof parsed === 'object' ? parsed : {};
            } catch (error) { return {}; }
        }
        return {};
    }

    window.showModal = function (data) {
        data = data || {};
        const social = parseSocialMedia(data.social_media);
        $('#user_id').val(data.user_id || '');
        $('#username').val(data.username || '').prop('readonly', false);
        $('#realname').val(data.realname || '');
        $('#email').val(data.email || '');
        $('#user_type').val(data.user_type || '1');
        $('#inputFacebook').val(social.fb || '');
        $('#inputTwitter').val(social.tw || '');
        $('#inputLinkedIn').val(social.li || '');
        $('#inputReddit').val(social.rd || '');
        $('#inputPinterest').val(social.pn || '');
        $('#inputGooglePlus').val(social.gp || '');
        $('#inputYouTube').val(social.yt || '');
        $('#inputBlog').val(social.bl || '');
        $('#inputYahooMessenger').val(social.ym || '');
        $('#passwd1, #passwd2').val('');
        $('#validation_pass, #validation_confirm_pass').text('');
        $('#save_button').prop('disabled', false);
        $('#modal_action').modal('show');
    };

    window.confirm_pass = function () {
        const password = String($('#passwd1').val() || '');
        const confirmation = String($('#passwd2').val() || '');
        const strong = /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password);
        if (password && password.length < 8) {
            $('#validation_pass').text('Password minimal 8 karakter.');
        } else if (password && !strong) {
            $('#validation_pass').text('Gunakan huruf besar, huruf kecil, dan angka.');
        } else {
            $('#validation_pass').text('');
        }
        if (confirmation && password !== confirmation) {
            $('#validation_confirm_pass').text('Password tidak cocok.');
        } else {
            $('#validation_confirm_pass').text('');
        }
        const valid = (!password && !confirmation) || (password.length >= 8 && password === confirmation && strong);
        $('#save_button').prop('disabled', !valid);
    };

    $(function () {
        $('#profileForm').off('submit.rangkuiProfile').on('submit.rangkuiProfile', function (event) {
            const password = String($('#passwd1').val() || '');
            const confirmation = String($('#passwd2').val() || '');
            const strong = /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password);
            if ((password || confirmation) &&
                (password.length < 8 || password !== confirmation || !strong)) {
                event.preventDefault();
                window.confirm_pass();
                return false;
            }
        });

        $('#profile_avatar').off('change.rangkuiAvatar').on('change.rangkuiAvatar', function () {
            const file = this.files && this.files[0];
            if (!file) return;
            if (file.size > 2 * 1024 * 1024) {
                window.alert('Ukuran foto maksimal 2 MB.');
                this.value = '';
                return;
            }
            const allowed = ['image/jpeg', 'image/png', 'image/webp'];
            if (file.type && allowed.indexOf(file.type.toLowerCase()) === -1) {
                window.alert('Format foto harus JPG, PNG, atau WEBP.');
                this.value = '';
                return;
            }
            if (window.FileReader) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    $('#profileAvatarPreview').attr('src', event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
})(window, window.jQuery);
