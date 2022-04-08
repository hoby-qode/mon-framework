<?php

interface Model
{
    public function findAll();

    public function find($param);

    public function findLastId();
}