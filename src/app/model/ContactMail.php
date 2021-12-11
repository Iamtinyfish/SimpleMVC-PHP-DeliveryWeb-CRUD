<?php

class ContactMail
{
    public int $id;
    public string $senderName;
    public string $senderEmail;
    public string $title;
    public string $content;
    public string $time;
    public int $account_id;

    public function __construct(int $id, string $senderName, string $senderEmail, string $title, string $content, string $time, int $account_id)
    {
        $this->id = $id;
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
        $this->title = $title;
        $this->content = $content;
        $this->time = $time;
        $this->account_id = $account_id;
    }
}