<?php
   
class Video {
   
      private $id;
      private $titulo;
      private $descricao;
      private $caminho;
      
      function __construct($id, $titulo, $descricao, $caminho) {
      	  $this->id = $id;
      	  $this->titulo = $titulo;
      	  $this->descricao = $descricao;
      	  $this->caminho = $caminho;
      }
      
      public function getId() {
          return $this->id;
      }
   
      public function setId($id) {
          $this->id = $id;
      }
   
      public function getTitulo() {
          return $this->titulo;
      }
   
      public function setTitulo($titulo) {
          $this->titulo = $titulo;
      }
   
      public function getDescricao() {
          return $this->descricao;
      }
   
      public function setDescricao($descricao) {
          $this->descricao = $descricao;
      }
   
      public function getCaminho() {
          return $this->caminho;
      }
   
      public function setCaminho($caminho) {
          $this->caminho = $caminho;
      }
      
      public function Inserir(Video $video) {
      	try {
      		$sql = "INSERT INTO videos (id, titulo,  descricao, caminho) VALUES ( :id, :titulo, :descricao, :caminho)";
      		        
      		$p_sql = Conexao::getInstance()->prepare($sql);
      		 
      		$p_sql->bindValue(":id", $video->getId());
      		$p_sql->bindValue(":titulo", $video->getTitulo());
      		$p_sql->bindValue(":descricao", $video->getDescricao());      		
      		$p_sql->bindValue(":caminho", $video->getCaminho());
      		return $p_sql->execute();
      	} catch (Exception $e) {
      		print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde.";
      	}
      }
      
 
   
  }
   
  ?>