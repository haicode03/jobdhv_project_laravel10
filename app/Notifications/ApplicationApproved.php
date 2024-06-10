<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Application;

class ApplicationApproved extends Notification
{
    use Queueable;

    protected $application;

    public function __construct($application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['database']; // Chỉ sử dụng cơ sở dữ liệu để lưu thông báo
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Đơn ứng tuyển của bạn đã được duyệt. Bạn vui lòng xác nhận lịch phỏng vấn vào ngày mai!',
            'application_id' => $this->application->id,
        ];
    }
}
