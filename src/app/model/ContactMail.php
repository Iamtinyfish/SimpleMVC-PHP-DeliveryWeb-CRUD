<?php

class ContactMail
{
    private int $id;
    private string $senderName;
    private string $senderEmail;
    private string $title;
    private string $content;
    private datetime $time;
    private int $account_id;

    /**
     * @param int $id
     * @param string $senderName
     * @param string $senderEmail
     * @param string $title
     * @param string $content
     * @param datetime $time
     * @param int $account_id
     */
    public function __construct(int $id, string $senderName, string $senderEmail, string $title, string $content, datetime $time, int $account_id)
    {
        $this->id = $id;
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
        $this->title = $title;
        $this->content = $content;
        $this->time = $time;
        $this->account_id = $account_id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSenderName(): string
    {
        return $this->senderName;
    }

    /**
     * @param string $senderName
     */
    public function setSenderName(string $senderName): void
    {
        $this->senderName = $senderName;
    }

    /**
     * @return string
     */
    public function getSenderEmail(): string
    {
        return $this->senderEmail;
    }

    /**
     * @param string $senderEmail
     */
    public function setSenderEmail(string $senderEmail): void
    {
        $this->senderEmail = $senderEmail;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return datetime
     */
    public function getTime(): datetime
    {
        return $this->time;
    }

    /**
     * @param datetime $time
     */
    public function setTime(datetime $time): void
    {
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getAccountId(): int
    {
        return $this->account_id;
    }

    /**
     * @param int $account_id
     */
    public function setAccountId(int $account_id): void
    {
        $this->account_id = $account_id;
    }


}