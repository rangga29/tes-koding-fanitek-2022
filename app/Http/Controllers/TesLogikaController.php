<?php

namespace App\Http\Controllers;

class TesLogikaController extends Controller
{
    function hitungKaosKaki($kaoskaki)
    {
        $count = 0;
        for ($i = 0; $i <= count($kaoskaki); $i++) {
            for ($j = $i + 1; $j < count($kaoskaki); $j++) {
                if ($kaoskaki[$i] === $kaoskaki[$j]) {
                    $count++;
                    unset($kaoskaki[$j]);
                    $kaoskaki = array_values($kaoskaki);
                    break;
                }
            }
        }
        return $count;
    }

    public function countKaosKaki()
    {
        $kaoskaki1 = array(5, 7, 7, 9, 10, 4, 5, 10, 6, 5);
        $kaoskaki2 = array(10, 20, 20, 10, 10, 30, 50, 10, 20);
        $kaoskaki3 = array(6, 5, 2, 3, 5, 2, 2, 1, 1, 5, 1, 3, 3, 3, 5);
        $kaoskaki4 = array(1, 1, 3, 1, 2, 1, 3, 3, 3, 3);

        return view('soal1', [
            'count1' => strval($this->hitungKaosKaki($kaoskaki1)),
            'count2' => strval($this->hitungKaosKaki($kaoskaki2)),
            'count3' => strval($this->hitungKaosKaki($kaoskaki3)),
            'count4' => strval($this->hitungKaosKaki($kaoskaki4)),
        ]);
    }

    public function hitungJumlahKata($kalimat)
    {
        $array_kalimat = explode(' ', $kalimat);
        $count = 0;

        // Mengubah Setiap Kata Menjadi Char
        for ($x = 0; $x < count($array_kalimat); $x++) {
            $temp_count = 0;
            $array_kata = str_split($array_kalimat[$x]);
            // Jika Kata Terakhir dari Kalimat
            if ($x == count($array_kalimat) - 1) {
                // Mengecek Array Char
                for ($y = 0; $y < count($array_kata); $y++) {
                    // Jika Char Menggunakan Special Char
                    if (!preg_match('/[a-zA-Z]/', $array_kata[$y], $matches)) {
                        // Jika Char Merupakan Char Terakhir
                        if ($y == count($array_kata) - 1) {
                            $temp_count++;
                            // echo ($array_kata[$y]);
                            // print_r('[Kata Terakhir Kalimat -- Menggunakan Special Char -- Char Terakhir]');
                            // echo '<br/>';
                        }
                        // Jika Char Bukan Char Terakhir
                        else {
                            // echo ($array_kata[$y]);
                            // print_r('[Kata Terakhir Kalimat -- Menggunakan Special Char -- Bukan Char Terakhir]');
                            // echo '<br/>';
                        }
                    }
                    // Jika Char Tidak Menggunakan Special Char
                    else {
                        $temp_count++;
                        // echo ($array_kata[$y]);
                        // print_r('[Kata Terakhir Kalimat -- Tidak Menggunakan Special Char]');
                        // echo '<br/>';
                    }
                }
            }
            // Jika Bukat Kata Terakhir dari Kalimat
            else {
                // Mengecek Array Char
                for ($y = 0; $y < count($array_kata); $y++) {
                    // Jika Char Menggunakan Special Char
                    if (!preg_match('/[a-zA-Z]/', $array_kata[$y], $matches)) {
                        // Jika Char Merupakan Char Terakhir
                        if ($y == count($array_kata) - 1) {
                            if ($array_kata[$y] === ',') {
                                $temp_count++;
                                // echo ($array_kata[$y]);
                                // print_r('[Bukan Kata Terakhir Kalimat -- Menggunakan Special Char -- Char Terakhir -- Pakai Koma]');
                                // echo '<br/>';
                            } else {
                                // echo ($array_kata[$y]);
                                // print_r('[Bukan Kata Terakhir Kalimat -- Menggunakan Special Char -- Char Terakhir -- Tidak Pakai Koma]');
                                // echo '<br/>';
                            }
                        }
                        // Jika Char Bukan Char Terakhir
                        else {
                            if ($array_kata[$y] === '-') {
                                $temp_count++;
                                // echo ($array_kata[$y]);
                                // print_r('[Bukan Kata Terakhir Kalimat -- Menggunakan Special Char -- Char Terakhir -- Pakai Strip]');
                                // echo '<br/>';
                            } else {
                                // echo ($array_kata[$y]);
                                // print_r('[Bukan Kata Terakhir Kalimat -- Menggunakan Special Char -- Bukan Char Terakhir]');
                                // echo '<br/>';
                            }
                        }
                    }
                    // Jika Char Tidak Menggunakan Special Char
                    else {
                        $temp_count++;
                        // echo ($array_kata[$y]);
                        // print_r('[Bukan Kata Terakhir Kalimat -- Tidak Menggunakan Special Char]');
                        // echo '<br/>';
                    }
                }
            }
            // echo ($temp_count);
            if ($temp_count == count($array_kata)) {
                $count++;
            }
            // echo ('</br></br>');
        }
        // echo ('Count : ' . $count);
        return $count;
    }

    public function countJumlahKata()
    {
        $kalimat1 = 'Kemarin Sophia per[gi ke mall.';
        $kalimat2 = 'Saat meng*ecat tembok, Agung dib_antu oleh Raihan';
        $kalimat3 = 'Berapa u(mur minimal[ untuk !mengurus ktp?';
        $kalimat4 = 'Masing-masing anak mendap(atkan uang jajan ya=ng be&rbeda.';

        return view('soal2', [
            'count1' => strval($this->hitungJumlahKata($kalimat1)),
            'count2' => strval($this->hitungJumlahKata($kalimat2)),
            'count3' => strval($this->hitungJumlahKata($kalimat3)),
            'count4' => strval($this->hitungJumlahKata($kalimat4)),
        ]);
    }
}
