<?php

class Postagem
{
    public $id_post;
    public $titulo;
    public $conteudo;
    public $imagem;
    public $id_usuario;
    public $id_categoria;
    public $data_pub;

    public function __construct($id_post = false)
    {
        if ($id_post) {
            $this->id_post = $id_post;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT titulo, conteudo, imagem, id_usuario, id_categoria, data_pub FROM postagem where id_post = :id_post";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_post", $this->id_post);
        $stmt->execute();
        $lista = $stmt->fetch();
        $this->titulo = $lista['titulo'];
        $this->conteudo = $lista['conteudo'];
        $this->imagem = $lista['imagem'];
        $this->id_usuario = $lista['id_usuario'];
        $this->id_categoria = $lista['id_categoria'];
        $this->data_pub = $lista['data_pub'];
    }

    public function inserir()
    {
        $query = "INSERT INTO postagem (titulo, conteudo, imagem, id_usuario, id_categoria) VALUES (:titulo, :conteudo, :imagem, :id_usuario, :id_categoria)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':titulo', $this->titulo);
        $stmt->bindValue(':conteudo', $this->conteudo);
        $stmt->bindValue(':imagem', $this->imagem);
        $stmt->bindValue(':id_usuario', $this->id_usuario);
        $stmt->bindValue(':id_categoria', $this->id_categoria);
        $stmt->execute();
    }

    public function editar_postagem()
    {
        $query = "UPDATE postagem SET titulo = :titulo, conteudo = :conteudo, id_categoria = :id_categoria WHERE id_post = :id_post";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':titulo', $this->titulo);
        $stmt->bindValue(':conteudo', $this->conteudo);
        $stmt->bindValue(':id_categoria', $this->id_categoria);
        $stmt->bindValue(':id_post', $this->id_post);

        $stmt->execute();
    }

    public function editarComImagem()
    {
        $query = "UPDATE postagem SET titulo = :titulo, conteudo = :conteudo, id_categoria = :id_categoria, imagem = :imagem WHERE id_post = :id_post";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':titulo', $this->titulo);
        $stmt->bindValue(':conteudo', $this->conteudo);
        $stmt->bindValue(':id_categoria', $this->id_categoria);
        $stmt->bindValue(':imagem', $this->imagem);
        $stmt->bindValue(':id_post', $this->id_post);

        $stmt->execute();
    }

    public function getNomeAutor()
    {
        $query = "SELECT nome_usuario FROM usuario WHERE id_usuario = :id_usuario";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_usuario', $this->id_usuario);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['nome_usuario'];
    }

    public static function listar()
    {
        $query = "select p.id_post, p.titulo, p.conteudo, p.imagem, p.data_pub,
        p.id_categoria, p.id_post,
        c.nome_categoria as nome_categoria,
        u.nome_usuario as nome_autor from postagem p
        inner join categoria c on p.id_categoria = c.id_categoria
        inner join usuario u on p.id_usuario = u.id_usuario
        order by p.data_pub desc";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarPorCategoria($categoria)
    {
        $query = "select p.id_post, p.titulo, p.conteudo, p.imagem, p.data_pub,
        p.id_categoria, p.id_post,
        c.nome_categoria as nome_categoria,
        u.nome_usuario as nome_autor from postagem p
        inner join categoria c on p.id_categoria = c.id_categoria
        inner join usuario u on p.id_usuario = u.id_usuario
        where p.id_categoria = :categoria 
        order by p.data_pub desc";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":categoria", $categoria);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public static function listarPorPalavra($palavra)
    {
        $palavra = "%" . $palavra . "%";
        $query = "select p.id_post, p.titulo, p.conteudo, p.imagem, p.data_pub,
        p.id_categoria, p.id_post,
        c.nome_categoria as nome_categoria,
        u.nome_usuario as nome_autor from postagem p
        inner join categoria c on p.id_categoria = c.id_categoria
        inner join usuario u on p.id_usuario = u.id_usuario
        where p.titulo like :palavra
        order by p.data_pub desc";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":palavra", $palavra);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function deletar()
    {
        $query = "DELETE FROM postagem WHERE id_post=:id_post";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue("id_post", $this->id_post);
        $stmt->execute();
    }

    public static function contarLinhas($limite){
        $query = "SELECT COUNT(*) FROM postagem";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $resultado = $stmt->fetchColumn();
        $total_pages = ceil($resultado / $limite);
        return $total_pages;
    }

    public static function listarPaginacao($limite, $deslocamento)
    {
        $query = "select p.id_post, p.titulo, p.conteudo, p.imagem, p.data_pub,
        p.id_categoria, p.id_post,
        c.nome_categoria as nome_categoria,
        u.nome_usuario as nome_autor from postagem p
        inner join categoria c on p.id_categoria = c.id_categoria
        inner join usuario u on p.id_usuario = u.id_usuario
        order by p.data_pub desc limit :limit offset :deslocamento";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':limit', $limite, PDO::PARAM_INT);
        $stmt->bindParam(':deslocamento', $deslocamento, PDO::PARAM_INT);
        $stmt->execute();
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }
}
