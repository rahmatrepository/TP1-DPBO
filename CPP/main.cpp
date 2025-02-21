#include "Petshop.cpp"

using namespace std;

int main() {
    Petshop petshop;
    int pilih;
    int id;
    string namaProduk;
    string kategoriProduk;
    int hargaProduk;

    while (true) {
        cout << "1. Tambah Produk" << endl;
        cout << "2. Ubah Produk" << endl;
        cout << "3. Hapus Produk" << endl;
        cout << "4. Tampilkan Produk" << endl;
        cout << "5. Cari Produk" << endl;
        cout << "6. Keluar" << endl;
        cout << "Pilih: ";
        cin >> pilih;

        switch (pilih) {
            case 1:
                cout << "Masukkan id: ";
                cin >> id;
                cout << "Masukkan nama produk: ";
                cin.ignore();
                getline(cin, namaProduk);
                cout << "Masukkan kategori produk: ";
                getline(cin, kategoriProduk);
                cout << "Masukkan harga produk: ";
                cin >> hargaProduk;
                petshop.tambahProduk(id, namaProduk, kategoriProduk, hargaProduk);
                break;
            case 2:
                cout << "Masukkan id produk yang ingin diubah: ";
                cin >> id;
                cout << "Masukkan nama produk: ";
                cin.ignore();
                getline(cin, namaProduk);
                cout << "Masukkan kategori produk: ";
                getline(cin, kategoriProduk);
                cout << "Masukkan harga produk: ";
                cin >> hargaProduk;
                petshop.ubahProduk(id, namaProduk, kategoriProduk, hargaProduk);
                break;
            case 3:
                cout << "Masukkan id produk yang ingin dihapus: ";
                cin >> id;
                petshop.hapusProduk(id);
                break;
            case 4:
                petshop.tampilkanProduk();
                break;
            case 5:
                cout << "Masukkan id produk yang ingin dicari: ";
                cin >> id;
                petshop.cariProduk(id);
                break;
            case 6:
                return 0;
            default:
                cout << "Pilihan tidak valid" << endl;
        }
    }

    return 0;
}
