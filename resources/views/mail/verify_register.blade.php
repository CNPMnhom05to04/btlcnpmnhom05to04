<!DOCTYPE html>
<html>
<head>
    <title>Thông báo từ Trà Tâm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0;padding:0;font-family:Arial,sans-serif;">
<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background-color:#f9f9f9;">
    <tr>
        <td align="center" style="padding:20px;">
            <table role="presentation" style="width:600px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;background-color:#ffffff;">
                <tr>
                    <td style="padding:20px;">
                        <div style="border-top:1px solid #cccccc;margin-top:20px;"></div>
                        <p>Chào bạn!,</p>
                        <p>Tâm trà shop xin được chào mừng tài khoản : <strong>{{$data['user_name']}}</strong> đã đăng kí tại website của chúng tôi</p>
                        <ul>
                            <li>Click để xác nhận email và đăng nhập ngay: <a href="{{route('verify.user',[ 'user_id' => $data['user_id'], 'token' => $data['verification_code'] ])}}"
                                         style="display:inline-block;padding:5px 15px;background-color:#337ab7;color:#ffffff;text-decoration:none;border-radius:5px;">Kích hoạt tài khoản</a>
                        </ul>
                        <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
                        <div style="border-top:1px solid #cccccc;margin-top:20px;"></div>
                        <p style="margin-top:20px;">Trân trọng</p>
                        <p></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
