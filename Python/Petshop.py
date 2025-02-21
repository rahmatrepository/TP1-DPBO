class Petshop:
    def __init__(self, id_produk, nama_produk, kategori_produk, harga_produk):
        self.id_produk = id_produk
        self.nama_produk = nama_produk
        self.kategori_produk = kategori_produk
        self.harga_produk = harga_produk

    def get_id_produk(self):
        return self.id_produk

    def get_nama_produk(self):
        return self.nama_produk

    def get_kategori_produk(self):
        return self.kategori_produk

    def get_harga_produk(self):
        return self.harga_produk

    def set_id_produk(self, id_produk):
        self.id_produk = id_produk

    def set_nama_produk(self, nama_produk):
        self.nama_produk = nama_produk

    def set_kategori_produk(self, kategori_produk):
        self.kategori_produk = kategori_produk

    def set_harga_produk(self, harga_produk):
        self.harga_produk = harga_produk

    def tampilkan_produk(self):
        print("ID Produk: ", self.id_produk)
        print("Nama Produk: ", self.nama_produk)
        print("Kategori Produk: ", self.kategori_produk)
        print("Harga Produk: ", self.harga_produk)

    @staticmethod
    def tambah_produk():
        id_produk = input("Masukkan ID produk: ")
        nama_produk = input("Masukkan nama produk: ")
        kategori_produk = input("Masukkan kategori produk: ")
        harga_produk = int(input("Masukkan harga produk: "))
        return Petshop(id_produk, nama_produk, kategori_produk, harga_produk)

    def ubah_produk(self):
        id_produk = input("Masukkan ID produk: ")
        nama_produk = input("Masukkan nama produk: ")
        kategori_produk = input("Masukkan kategori produk: ")
        harga_produk = int(input("Masukkan harga produk: "))
        self.set_id_produk(id_produk)
        self.set_nama_produk(nama_produk)
        self.set_kategori_produk(kategori_produk)
        self.set_harga_produk(harga_produk)

    def hapus_produk(self):
        self.set_id_produk("")
        self.set_nama_produk("")
        self.set_kategori_produk("")
        self.set_harga_produk(0)

    @staticmethod
    def cari_produk(daftar_produk):
        id_produk = input("Masukkan ID produk yang ingin dicari: ")
        for produk in daftar_produk:
            if produk.get_id_produk() == id_produk:
                produk.tampilkan_produk()
                return
        print("Produk tidak ditemukan")

