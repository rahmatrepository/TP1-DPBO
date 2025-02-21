package TP.TP_1.Java;

import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        ArrayList<Petshop> petshops = new ArrayList<Petshop>();
        int pilih;
        int id;
        String namaProduk;
        String kategoriProduk;
        int hargaProduk;

        while (true) {
            System.out.println("1. Tambah Produk");
            System.out.println("2. Ubah Produk");
            System.out.println("3. Hapus Produk");
            System.out.println("4. Tampilkan Produk");
            System.out.println("5. Cari Produk");
            System.out.println("6. Keluar");
            System.out.print("Pilih: ");
            Scanner input = new Scanner(System.in);
            pilih = input.nextInt();

            switch (pilih) {
                case 1:
                    System.out.print("Masukkan id: ");
                    id = input.nextInt();
                    System.out.print("Masukkan nama produk: ");
                    namaProduk = input.next();
                    System.out.print("Masukkan kategori produk: ");
                    kategoriProduk = input.next();
                    System.out.print("Masukkan harga produk: ");
                    hargaProduk = input.nextInt();
                    Petshop petshop = new Petshop(id, namaProduk, kategoriProduk, hargaProduk);
                    petshops.add(petshop);
                    break;
                case 2:
                    System.out.print("Masukkan id produk yang ingin diubah: ");
                    id = input.nextInt();
                    System.out.print("Masukkan nama produk: ");
                    namaProduk = input.next();
                    System.out.print("Masukkan kategori produk: ");
                    kategoriProduk = input.next();
                    System.out.print("Masukkan harga produk: ");
                    hargaProduk = input.nextInt();
                    for (Petshop p : petshops) {
                        if (p.getId() == id) {
                            p.setNamaProduk(namaProduk);
                            p.setKategoriProduk(kategoriProduk);
                            p.setHargaProduk(hargaProduk);
                            break;
                        }
                    }
                    break;
                case 3:
                    System.out.print("Masukkan id produk yang ingin dihapus: ");
                    id = input.nextInt();
                    for (int i = 0; i < petshops.size(); i++) {
                        if (petshops.get(i).getId() == id) {
                            petshops.remove(i);
                            break;
                        }
                    }
                    break;
                case 4:
                    for (Petshop p : petshops) {
                        p.tampilkanProduk();
                    }
                    break;
                case 5:
                    System.out.print("Masukkan id produk yang ingin dicari: ");
                    id = input.nextInt();
                    for (Petshop p : petshops) {
                        if (p.getId() == id) {
                            p.tampilkanProduk();
                            break;
                        }
                    }
                    break;
                case 6:
                    System.exit(0);
                    break;
                default:
                    break;
            }
            input.close();
        }
    }
}

