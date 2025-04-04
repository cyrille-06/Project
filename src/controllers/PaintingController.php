<?php

class PaintingController{
    private $paintingModel;
    public function __construct($pdo){
        $this->paintingModel = new Painting($pdo);
    }
    public function showAll(){
        return $this->paintingModel->getAll();
    }

    public function create ($title, $year, $artist, $width, $height){
        return $this->paintingModel->add($title, $year, $artist, $width, $height);
    }
public function edit($id){
    return $this->paintingModel->get($id);
}

public function update($id,$title,$year,$artist,$width,$height){
    return $this->paintingModel->update($id, $title, $year, $artist, $width, $height);

}

public function delete($id){
    return $this->paintingModel->delete($id);
}

}
?>