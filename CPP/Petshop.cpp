#include <iostream>
#include <string>

using namespace std;
class Petshop {
    private:
    int id;
    string namaProduk;
    string kategoriProduk;
    int hargaProduk;

    public:
    // setter
    void setId(int id) {
        this->id = id;
    }
    // setter
    void setNamaProduk(string namaProduk) {
        this->namaProduk = namaProduk;
    }
    void setKategoriProduk(string kategoriProduk) {
        this->kategoriProduk = kategoriProduk;
    }
    void setHargaProduk(int hargaProduk) {
        this->hargaProduk = hargaProduk;
    }

    // getter
    int getId() {
        return this->id;
    }
    string getNamaProduk() {
        return this->namaProduk;
    }
    string getKategoriProduk() {
        return this->kategoriProduk;
    }
    int getHargaProduk() {
        return this->hargaProduk;
    }

    
    // CRUD
    void tambahProduk(int id, string namaProduk, string kategoriProduk, int hargaProduk) {
        this->id = id;
        this->namaProduk = namaProduk;
        this->kategoriProduk = kategoriProduk;
        this->hargaProduk = hargaProduk;// memanggil setter
    }

    void ubahProduk(int id, string namaProduk, string kategoriProduk, int hargaProduk) {
        this->id = id;// memanggil setter
        this->namaProduk = namaProduk;// memanggil setter
        this->kategoriProduk = kategoriProduk;// memanggil setter
        this->hargaProduk = hargaProduk;// memanggil setter
    }

    void hapusProduk(int id) {// memanggil setter
        this->id = 0;
        this->namaProduk = "";
        this->kategoriProduk = "";
        this->hargaProduk = 0;
    }
    
    void cariProduk(int id) {
        if (this->id == id) {
            cout << "Id: " << this->id << endl;
            cout << "Nama Produk: " << this->namaProduk << endl;
            cout << "Kategori Produk: " << this->kategoriProduk << endl;
            cout << "Harga Produk: " << this->hargaProduk << endl;
        } else {
            cout << "Data tidak ditemukan" << endl;
        }
    }

    
    void tampilkanProduk() {
        cout << "Id: " << this->id << endl;
        cout << "Nama Produk: " << this->namaProduk << endl;
        cout << "Kategori Produk: " << this->kategoriProduk << endl;
        cout << "Harga Produk: " << this->hargaProduk << endl;
    }
};
