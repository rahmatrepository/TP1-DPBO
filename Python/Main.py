from Petshop import Petshop

def main():
    petshops = []
    while True:
        print("1. Tambah Produk")
        print("2. Ubah Produk")
        print("3. Hapus Produk")
        print("4. Tampilkan Produk")
        print("5. Cari Produk")
        print("6. Keluar")
        pilih = int(input("Pilih: "))

        if pilih == 1:
            id_produk = input("Masukkan ID produk: ")
            nama_produk = input("Masukkan nama produk: ")
            kategori_produk = input("Masukkan kategori produk: ")
            harga_produk = int(input("Masukkan harga produk: "))
            petshop = Petshop(id_produk, nama_produk, kategori_produk, harga_produk)
            petshops.append(petshop)
        elif pilih == 2:
            id_produk = input("Masukkan ID produk yang ingin diubah: ")
            for petshop in petshops:
                if petshop.get_id_produk() == id_produk:
                    nama_produk = input("Masukkan nama produk: ")
                    kategori_produk = input("Masukkan kategori produk: ")
                    harga_produk = int(input("Masukkan harga produk: "))
                    petshop.set_nama_produk(nama_produk)
                    petshop.set_kategori_produk(kategori_produk)
                    petshop.set_harga_produk(harga_produk)
                    break
        elif pilih == 3:
            id_produk = input("Masukkan ID produk yang ingin dihapus: ")
            for petshop in petshops:
                if petshop.get_id_produk() == id_produk:
                    petshops.remove(petshop)
                    break
        elif pilih == 4:
            for petshop in petshops:
                petshop.tampilkan_produk()
        elif pilih == 5:
            id_produk = input("Masukkan ID produk yang ingin dicari: ")
            for petshop in petshops:
                if petshop.get_id_produk() == id_produk:
                    petshop.tampilkan_produk()
                    break
        elif pilih == 6:
            break

if __name__ == "__main__":
    main()

