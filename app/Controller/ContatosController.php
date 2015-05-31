<?
    class ContatosController extends AppController{

        public $uses = array("Contato", "Cliente");

        public function index(){
            $this->set("contatos", $this->paginate("Contato"));
        }
        public function create() {
            $this->set("clientes", $this->Cliente->find("list"));
            if($this->request->is("POST")){
                if($this->Contato->save($this->request->data)){
                    $this->Session->setFlash("Contato cadastrado com sucesso!");
                    $this->redirect("/contatos");
                }
            }
        }
        public function edit($id) {
            if($this->request->is("PUT")){
                $this->request->data["Contato"]["id"] = $id;
                if($this->Contato->save($this->request->data)){
                    $this->Session->setFlash("Contato alterado com sucesso!");
                    $this->redirect("/contatos");
                }
            }else{
                $this->request->data = $this->Contato->findById($id);
            }
        }
        public function delete($id){
            $this->Contato->delete($id);
            $this->Session->setFlash("Contato excluído com sucesso!");
            $this->redirect("/contatos");
        }

    }