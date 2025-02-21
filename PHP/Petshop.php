<?php

class Petshop {
    private $id;
    private $nama_produk;
    private $kategori_produk;
    private $harga_produk;
    private $foto_produk;

    public function __construct($id, $nama_produk, $kategori_produk, $harga_produk, $foto_produk) {
        $this->id = $id;
        $this->nama_produk = $nama_produk;
        $this->kategori_produk = $kategori_produk;
        $this->harga_produk = $harga_produk;
        $this->foto_produk = $foto_produk;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNamaProduk($nama_produk) {
        $this->nama_produk = $nama_produk;
    }

    public function getNamaProduk() {
        return $this->nama_produk;
    }

    public function setKategoriProduk($kategori_produk) {
        $this->kategori_produk = $kategori_produk;
    }

    public function getKategoriProduk() {
        return $this->kategori_produk;
    }

    public function setHargaProduk($harga_produk) {
        $this->harga_produk = $harga_produk;
    }

    public function getHargaProduk() {
        return $this->harga_produk;
    }

    public function setFotoProduk($foto_produk) {
        $this->foto_produk = $foto_produk;
    }

    public function getFotoProduk() {
        return $this->foto_produk;
    }
}
