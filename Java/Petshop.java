package TP.TP_1.Java;

public class Petshop {// CRUD
    private int id;// getter
    private String namaProduk;// setter
    private String kategoriProduk;// setter
    private int hargaProduk;// setter

    public Petshop() {
    }
// CRUD
    public Petshop(int id, String namaProduk, String kategoriProduk, int hargaProduk) {
        this.id = id;
        this.namaProduk = namaProduk;
        this.kategoriProduk = kategoriProduk;
        this.hargaProduk = hargaProduk;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNamaProduk() {
        return namaProduk;
    }

    public void setNamaProduk(String namaProduk) {
        this.namaProduk = namaProduk;
    }

    public String getKategoriProduk() {
        return kategoriProduk;
    }

    public void setKategoriProduk(String kategoriProduk) {
        this.kategoriProduk = kategoriProduk;
    }

    public int getHargaProduk() {
        return hargaProduk;
    }

    public void setHargaProduk(int hargaProduk) {
        this.hargaProduk = hargaProduk;
    }
    public void tampilkanProduk() {
        System.out.println("Id: " + this.id);
        System.out.println("Nama Produk: " + this.namaProduk);
        System.out.println("Kategori Produk: " + this.kategoriProduk);
        System.out.println("Harga Produk: " + this.hargaProduk);
    }

    public void tambahProduk(int id, String namaProduk, String kategoriProduk, int hargaProduk) {
        this.id = id;
        this.namaProduk = namaProduk;
        this.kategoriProduk = kategoriProduk;
        this.hargaProduk = hargaProduk;
    }

    public void ubahProduk(int id, String namaProduk, String kategoriProduk, int hargaProduk) {
        this.id = id;
        this.namaProduk = namaProduk;
        this.kategoriProduk = kategoriProduk;
        this.hargaProduk = hargaProduk;
    }

    public void hapusProduk(int id) {
        this.id = 0;
        this.namaProduk = "";
        this.kategoriProduk = "";
        this.hargaProduk = 0;
    }

    public void cariProduk(int id) {
        if (this.id == id) {
            this.tampilkanProduk();
        } else {
            System.out.println("Data tidak ditemukan");
        }
    }
}
