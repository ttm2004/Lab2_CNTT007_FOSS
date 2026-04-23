<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Forever - Đăng ký</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px;
            background: #f0f0f0;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 28px;
            margin: 0 0 10px 0;
            color: #2c3e50;
        }
        .menu {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 8px 0;
            margin-bottom: 20px;
            font-size: 14px;
            word-spacing: 15px;
        }
        .menu span {
            margin-right: 15px;
        }
        hr {
            margin: 15px 0;
            border: 0;
            border-top: 1px dashed #aaa;
        }
        .section {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 12px;
            background: #fefefe;
        }
        .section-title {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 12px;
            background: #e9ecef;
            padding: 5px 8px;
        }
        .row {
            margin-bottom: 12px;
            display: flex;
            align-items: flex-start;
        }
        .label {
            width: 170px;
            font-weight: normal;
            padding-top: 4px;
        }
        .field {
            flex: 1;
        }
        input, select {
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }
        .radio-group {
            display: flex;
            gap: 20px;
            padding-top: 4px;
        }
        .radio-group label {
            font-weight: normal;
            margin-right: 10px;
        }
        .dob-group {
            display: flex;
            gap: 5px;
        }
        .dob-group select, .dob-group input {
            width: auto;
            flex: 1;
        }
        button {
            margin-top: 10px;
            padding: 8px 20px;
            background: #2c3e50;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
        button#resetBtn {
            background: #95a5a6;
        }
        .error-msg {
            color: red;
            font-size: 12px;
            margin-top: 3px;
        }
        input.error, select.error {
            border: 1px solid red;
            background: #ffeeee;
        }
        .msg-box {
            margin: 15px 0;
            padding: 10px;
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            display: none;
        }
        .msg-box.error-box {
            background: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
        small {
            font-size: 11px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Books Forever</h1>
    <div class="menu">
        <span>Home</span> | <span>Bestsellers</span> | <span>Magazines</span> | <span>Bargain</span> | 
        <span>New Releases</span> | <span>E-Books</span> | <span>Contact</span>
    </div>

    <div id="messageArea" class="msg-box"></div>

    <form id="regForm">
        <!-- Phần 1: ĐĂNG KÝ NGƯỜI DÙNG -->
        <div class="section">
            <div class="section-title">📝 ĐĂNG KÝ NGƯỜI DÙNG :</div>
            <div class="row">
                <div class="label">Tên đăng nhập : *</div>
                <div class="field">
                    <input type="text" id="username" placeholder="Nhập tên đăng nhập">
                    <div class="error-msg" id="usernameErr"></div>
                </div>
            </div>
            <div class="row">
                <div class="label">Mật khẩu : *</div>
                <div class="field">
                    <input type="password" id="password" placeholder="Mật khẩu">
                    <div class="error-msg" id="passwordErr"></div>
                </div>
            </div>
            <div class="row">
                <div class="label">(Tôi thêm 5 ký tự) :</div>
                <div class="field">
                    <input type="text" id="extraChars" maxlength="5" placeholder="Nhập 5 ký tự">
                    <small>(không bắt buộc)</small>
                </div>
            </div>
            <div class="row">
                <div class="label">Gõ lại mật khẩu : *</div>
                <div class="field">
                    <input type="password" id="confirmPwd" placeholder="Nhập lại mật khẩu">
                    <div class="error-msg" id="confirmErr"></div>
                </div>
            </div>
        </div>

        <!-- Phần 2: Nhập thông tin lấy lại mật khẩu -->
        <div class="section">
            <div class="section-title">🔐 Nhập thông tin để lấy lại mật khẩu khi quên</div>
            <div class="row">
                <div class="label">Câu hỏi bí mật :</div>
                <div class="field" style="display: flex; gap: 5px;">
                    <select id="secretQuestion" style="flex:1">
                        <option value="">-- Chọn câu hỏi --</option>
                        <option value="Tên thú cưng của bạn?">Tên thú cưng của bạn?</option>
                        <option value="Trường tiểu học của bạn?">Trường tiểu học của bạn?</option>
                        <option value="Tên người bạn thân nhất?">Tên người bạn thân nhất?</option>
                    </select>
                    <span style="font-size:18px;">✓</span>
                </div>
            </div>
            <div class="row">
                <div class="label">Trả lời :</div>
                <div class="field">
                    <input type="text" id="secretAnswer" placeholder="Câu trả lời">
                </div>
            </div>
        </div>

        <!-- Phần 3: Thông tin cá nhân -->
        <div class="section">
            <div class="section-title">👤 Thông tin cá nhân</div>
            <div class="row">
                <div class="label">Họ và tên :</div>
                <div class="field">
                    <input type="text" id="fullname" placeholder="Họ và tên">
                </div>
            </div>
            <div class="row">
                <div class="label">Ngày sinh : (Month, DD, YYYY)</div>
                <div class="field">
                    <div class="dob-group">
                        <select id="month">
                            <option value="">Tháng</option>
                            <option value="1">1 - Jan</option><option value="2">2 - Feb</option>
                            <option value="3">3 - Mar</option><option value="4">4 - Apr</option>
                            <option value="5">5 - May</option><option value="6">6 - Jun</option>
                            <option value="7">7 - Jul</option><option value="8">8 - Aug</option>
                            <option value="9">9 - Sep</option><option value="10">10 - Oct</option>
                            <option value="11">11 - Nov</option><option value="12">12 - Dec</option>
                        </select>
                        <input type="text" id="day" placeholder="DD" maxlength="2" size="3">
                        <input type="text" id="year" placeholder="YYYY" maxlength="4" size="5">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="label">Giới tính :</div>
                <div class="field radio-group">
                    <label><input type="radio" name="gender" value="Nam" checked> ☑ Nam</label>
                    <label><input type="radio" name="gender" value="Nữ"> ☐ Nữ</label>
                </div>
            </div>
            <div class="row">
                <div class="label">Nghề nghiệp liên quan :</div>
                <div class="field" style="display: flex; gap: 5px;">
                    <select id="job" style="flex:1">
                        <option value="">-- Chọn ngành nghề --</option>
                        <option value="Sinh viên">Sinh viên</option>
                        <option value="Giáo viên">Giáo viên</option>
                        <option value="Kỹ sư">Kỹ sư</option>
                        <option value="Nhân viên văn phòng">Nhân viên văn phòng</option>
                        <option value="Khác">Khác</option>
                    </select>
                    <span style="font-size:18px;">✓</span>
                </div>
            </div>
        </div>

        <div>
            <button type="submit">Đăng ký</button>
            <button type="button" id="resetBtn">Làm mới</button>
        </div>
    </form>
</div>
<script src="script.js"></script>
</body>
</html>