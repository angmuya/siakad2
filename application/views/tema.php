<?php
$this->load->view('Template/Header',['title' => $title]);
$this->load->view('Template/Sidebar');
$this->load->view('Template/Navbar');
$this->load->view($konten);
$this->load->view('Template/Footer');
