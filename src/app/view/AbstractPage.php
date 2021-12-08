<?php

abstract class AbstractPage
{
    private string $header;
    private string $sidebar;
    private string $footer;

    public function __construct(array $data = [])
    {
        $this->loadData($data);
        $this->loadHeader();
        $this->loadSidebar();
        $this->loadFooter();
    }

    abstract protected function loadHeader() : void;

    abstract protected function loadSidebar() : void;

    abstract protected function loadData($data) : void;

    abstract protected function loadFooter() : void;

    abstract public function render() : void;
}