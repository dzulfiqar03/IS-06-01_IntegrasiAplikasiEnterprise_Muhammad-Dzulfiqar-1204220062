<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;

class BookController extends BaseController
{
    public function index()
    {
        try {
            $client = \Config\Services::curlrequest();
            $url = 'http://127.0.0.1:8000/api/books';

            $response = $client->get($url, [
                'headers' => ['Accept' => 'application/json'],
                'timeout' => 10
            ]);

            $body = $response->getBody();

            $json = json_decode($body, true);

            if (!isset($json['data']) || !is_array($json['data'])) {
                throw new \Exception('API tidak mengembalikan array buku valid');
            }

            $books = $json['data']; // ambil hanya array buku

            return view('book', ['books' => $books]);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return "Terjadi error saat fetch API: " . $e->getMessage();
        }
    }

    public function store()
    {
        try {
            $client = \Config\Services::curlrequest();
            $url = 'http://127.0.0.1:8000/api/books';

            $response = $client->post($url, [
                'headers' => ['Accept' => 'application/json'],
                'json' => [
                    'judul' => $this->request->getPost('judul'),
                    'pengarang' => $this->request->getPost('pengarang'),
                    'penerbit' => $this->request->getPost('penerbit'),
                    'tahun_terbit' => $this->request->getPost('tahun_terbit'),
                    'jumlah_halaman' => $this->request->getPost('jumlah_halaman'),
                    'isbn' => $this->request->getPost('isbn'),
                    'status' => $this->request->getPost('status'),
                ],
                'timeout' => 10
            ]);

            $body = $response->getBody();

            $json = json_decode($body, true);

            if (!isset($json['data']) || !is_array($json['data'])) {
                throw new \Exception('API tidak mengembalikan array buku valid');
            }

            $books = $json['data']; // ambil hanya array buku

            return response_success(null, 'Data berhasil disimpan.');;
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return response_error('Gagal menyimpan data.');
        }
    }

public function update($id)
{
    try {
        $client = \Config\Services::curlrequest();

        // URL API Laravel
        $url = "http://localhost:8000/api/books/{$id}";

        // Forward ke API Laravel pakai PUT
        $response = $client->put($url, [
            'headers' => ['Accept' => 'application/json'],
            'json' => [
                'judul'          => $this->request->getPost('judul'),
                'pengarang'      => $this->request->getPost('pengarang'),
                'penerbit'       => $this->request->getPost('penerbit'),
                'tahun_terbit'   => $this->request->getPost('tahun_terbit'),
                'jumlah_halaman' => $this->request->getPost('jumlah_halaman'),
                'isbn'           => $this->request->getPost('isbn'),
                'status'         => $this->request->getPost('status'),
            ],
            'timeout' => 10
        ]);

        $status = $response->getStatusCode();
        $body = json_decode($response->getBody(), true);

        if ($status == 200) {
            return response_success($body, 'Data berhasil diperbarui.');
        } else {
            return response_error('Gagal memperbarui data. Status: ' . $status);
        }

    } catch (\Exception $e) {
        log_message('error', '[BOOK_UPDATE_ERROR] ' . $e->getMessage());
        return response_error('Gagal menyimpan data: ' . $e->getMessage());
    }
}

public function destroy($id)
{
    try {
        $client = \Config\Services::curlrequest();

        // URL API Laravel
        $url = "http://localhost:8000/api/books/{$id}";

        // Forward ke API Laravel pakai PUT
        $response = $client->delete($url, [
            'headers' => ['Accept' => 'application/json'],
            'timeout' => 10
        ]);

        $status = $response->getStatusCode();
        $body = json_decode($response->getBody(), true);

        if ($status == 200) {
            return response_success($body, 'Data berhasil dihapus.');
        } else {
            return response_error('Gagal memperbarui data. Status: ' . $status);
        }

    } catch (\Exception $e) {
        log_message('error', '[BOOK_UPDATE_ERROR] ' . $e->getMessage());
        return response_error('Gagal menyimpan data: ' . $e->getMessage());
    }
}
}
