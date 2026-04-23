// Lấy các phần tử
    const form = document.getElementById('regForm');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const confirmPwd = document.getElementById('confirmPwd');
    const usernameErr = document.getElementById('usernameErr');
    const passwordErr = document.getElementById('passwordErr');
    const confirmErr = document.getElementById('confirmErr');
    const msgBox = document.getElementById('messageArea');

    // Hàm hiển thị thông báo (success hoặc error)
    function showMessage(text, isError = false) {
        msgBox.style.display = 'block';
        msgBox.textContent = text;
        if (isError) {
            msgBox.className = 'msg-box error-box';
        } else {
            msgBox.className = 'msg-box';
        }
        // Tự động ẩn sau 4 giây đối với thông báo thành công? nhưng giữ để thấy
        if (!isError) {
            setTimeout(() => {
                if (msgBox && !msgBox.className.includes('error-box')) {
                    msgBox.style.display = 'none';
                }
            }, 4000);
        }
    }

    // Xóa lỗi hiển thị trên field
    function clearFieldErrors() {
        username.classList.remove('error');
        password.classList.remove('error');
        confirmPwd.classList.remove('error');
        usernameErr.textContent = '';
        passwordErr.textContent = '';
        confirmErr.textContent = '';
    }

    // Hàm validate chính
    function validateForm() {
        let isValid = true;
        clearFieldErrors();
        
        // 1. Tên đăng nhập không rỗng
        const usernameVal = username.value.trim();
        if (usernameVal === '') {
            usernameErr.textContent = 'Tên đăng nhập không được phép rỗng';
            username.classList.add('error');
            isValid = false;
        }
        
        // 2. Mật khẩu ít nhất 5 ký tự
        const passVal = password.value;
        if (passVal.length < 5) {
            passwordErr.textContent = 'Mật khẩu phải chứa ít nhất 5 ký tự';
            password.classList.add('error');
            isValid = false;
        }
        
        // 3. Mật khẩu nhập lại phải trùng
        const confirmVal = confirmPwd.value;
        if (passVal !== confirmVal) {
            confirmErr.textContent = 'Mật khẩu nhập lại phải trùng với mật khẩu';
            confirmPwd.classList.add('error');
            isValid = false;
        } else if (passVal.length >= 5 && passVal === confirmVal) {
            // ok
        } else if (passVal.length < 5 && confirmVal !== '') {
            // nếu mật khẩu chưa đủ 5 ký tự nhưng confirm nhập, vẫn báo lỗi mật khẩu đã có, không cần thêm
        }
        
        return isValid;
    }

    // Xử lý submit
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const valid = validateForm();
        if (valid) {
            // lấy thông tin để hiển thị đăng ký thành công (không cần quá cầu kỳ)
            const ten = username.value.trim();
            const hoTen = document.getElementById('fullname').value.trim() || '(chưa nhập)';
            const gioitinh = document.querySelector('input[name="gender"]:checked').value;
            let ngaySinh = '';
            const month = document.getElementById('month').value;
            const day = document.getElementById('day').value.trim();
            const year = document.getElementById('year').value.trim();
            if (month && day && year) {
                ngaySinh = `${month}/${day}/${year}`;
            } else {
                ngaySinh = '(chưa nhập đủ)';
            }
            showMessage(`✅ Đăng ký thành công! Chào mừng ${ten}. Họ tên: ${hoTen}, Giới tính: ${gioitinh}, Ngày sinh: ${ngaySinh}`, false);
            // Có thể tùy ý reset hoặc không, nhưng theo yêu cầu chỉ cần kiểm tra và thông báo
            // (giữ nguyên dữ liệu hoặc không reset, nhưng người dùng có nút làm mới)
        } else {
            showMessage('❌ Đăng ký thất bại. Vui lòng kiểm tra lại thông tin (tên đăng nhập không rỗng, mật khẩu >=5 ký tự, xác nhận mật khẩu trùng khớp).', true);
        }
    });
    
    // Nút làm mới: reset toàn bộ form và xóa thông báo
    const resetBtn = document.getElementById('resetBtn');
    resetBtn.addEventListener('click', function() {
        form.reset();
        // Reset radio về Nam (checked)
        const radioNam = document.querySelector('input[value="Nam"]');
        if (radioNam) radioNam.checked = true;
        // Xóa lỗi và thông báo
        clearFieldErrors();
        msgBox.style.display = 'none';
        msgBox.textContent = '';
        // Xóa thêm các field extra (reset đã làm sạch nhưng cần clear style)
        document.querySelectorAll('.error').forEach(el => el.classList.remove('error'));
        // Đặt lại select câu hỏi, job, month về mặc định
        document.getElementById('secretQuestion').value = '';
        document.getElementById('job').value = '';
        document.getElementById('month').value = '';
        document.getElementById('day').value = '';
        document.getElementById('year').value = '';
        document.getElementById('extraChars').value = '';
        document.getElementById('secretAnswer').value = '';
        document.getElementById('fullname').value = '';
    });
    
    // Tiện ích: kiểm tra realtime mật khẩu trùng (nhẹ nhàng để tăng trải nghiệm, vẫn đảm bảo submit kiểm tra)
    function liveCheck() {
        const pass = password.value;
        const confirm = confirmPwd.value;
        if (confirm !== '') {
            if (pass !== confirm) {
                confirmErr.textContent = 'Mật khẩu nhập lại phải trùng với mật khẩu';
                confirmPwd.classList.add('error');
            } else if (pass.length >= 5 && pass === confirm) {
                confirmErr.textContent = '';
                confirmPwd.classList.remove('error');
            } else if (pass.length < 5 && pass === confirm) {
                // nếu pass thiếu độ dài thì ưu tiên lỗi mật khẩu, nhưng confirm chưa báo lỗi confirm
                if(passwordErr.textContent === '') {
                    confirmErr.textContent = '';
                    confirmPwd.classList.remove('error');
                }
            } else {
                confirmErr.textContent = 'Mật khẩu nhập lại không khớp';
                confirmPwd.classList.add('error');
            }
        } else {
            confirmErr.textContent = '';
            confirmPwd.classList.remove('error');
        }
        
        // Kiểm tra mật khẩu dài?
        if (pass.length > 0 && pass.length < 5) {
            passwordErr.textContent = 'Mật khẩu phải chứa ít nhất 5 ký tự';
            password.classList.add('error');
        } else if (pass.length >= 5) {
            passwordErr.textContent = '';
            password.classList.remove('error');
        } else if (pass.length === 0) {
            if(passwordErr.textContent !== '') passwordErr.textContent = '';
            password.classList.remove('error');
        }
        
        // Kiểm tra tên đăng nhập realtime
        if (username.value.trim() === '' && username.value !== '') {
            usernameErr.textContent = 'Tên đăng nhập không được phép rỗng';
            username.classList.add('error');
        } else if (username.value.trim() !== '') {
            usernameErr.textContent = '';
            username.classList.remove('error');
        } else if (username.value === '') {
            usernameErr.textContent = '';
            username.classList.remove('error');
        }
    }
    
    // Gắn sự kiện realtime để hỗ trợ
    password.addEventListener('input', liveCheck);
    confirmPwd.addEventListener('input', liveCheck);
    username.addEventListener('input', liveCheck);