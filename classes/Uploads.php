<?php

class Uploads {

    public $uploaddir = './uploads/';
    public $uniqId;
    public $arrArquivos;

    public function upload_arquivo($posicaoArquivo) {
        if ($this->uniqId == null) {
            $uniqId = date("d-m-Y_h-i-s_");
        }
        foreach ($_FILES[$posicaoArquivo]['name'] as $i => $arquivo) {
            $this->arrArquivos[$i] = $uniqId . basename($arquivo);
            $uploadfile = $this->uploaddir . $this->arrArquivos[$i];

            if (!move_uploaded_file($_FILES[$posicaoArquivo]['tmp_name'][$i], $uploadfile)) {
                throw new Exception(Erros::FALHA_UPLOAD);
            }
        }
    }

    public function lista_uploads() {
        $diretorio = dir($this->uploaddir);

        while ($arquivo = $diretorio->read()) {
            if ($arquivo != "." && $arquivo != "..") {
                $arrRetorno[] = $arquivo;
            }
        }
        $diretorio->close();
        return $arrRetorno;
    }

}
