<?php class Post extends Controller
{

    public function index()
    {
        // Load model
        $postModel = $this->loadModel('PostModel');

        // Get data from the model
        $posts = $postModel->getAll();

        // Load the view
        $this->loadView('posts', ['posts' => $posts]);
    }

    public function create()
    {
        $this->loadView('insert_post');
    }

    public function create_process()
    {
        $postModel = $this->loadModel('PostModel');
        $title = $_POST['title'];
        $content = $_POST['content'];

        $postModel->insert($title, $content);
        header('Location: ?c=Post');
    }

    public function edit()
    {
        $id = $_GET['id'];

        if (!$id) header('Location: index.php?c=Post');

        $postModel = $this->loadModel('PostModel');
        $post = $postModel->getById($id);

        if (!$post->num_rows) header('Location: index.php?c=Post');

        $this->loadView('edit', ['post' => $post->fetch_object()]);
    }

    public function edit_process()
    {
        $postModel = $this->loadModel('PostModel');
        $id = $_POST['id'];
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']);

        $postModel->update($title, $content, $id);

        header('Location: ?c=Post');
    }

    public function delete()
    {
        $id = $_POST['id'];
        $postModel = $this->loadModel('PostModel');

        $postModel->delete($id);
        header('Location: ?c=Post');
    }
}
