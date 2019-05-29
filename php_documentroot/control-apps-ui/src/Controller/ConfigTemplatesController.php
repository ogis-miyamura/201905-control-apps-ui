<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ConfigTemplates Controller
 *
 * @property \App\Model\Table\ConfigTemplatesTable $ConfigTemplates
 *
 * @method \App\Model\Entity\ConfigTemplate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConfigTemplatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $configTemplates = $this->paginate($this->ConfigTemplates);

        $this->set(compact('configTemplates'));
    }

    /**
     * View method
     *
     * @param string|null $id Config Template id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $configTemplate = $this->ConfigTemplates->get($id, [
            'contain' => []
        ]);

        $this->set('configTemplate', $configTemplate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $configTemplate = $this->ConfigTemplates->newEntity();
        if ($this->request->is('post')) {
            $configTemplate = $this->ConfigTemplates->patchEntity($configTemplate, $this->request->getData());
            if ($this->ConfigTemplates->save($configTemplate)) {
                $this->Flash->success(__('The config template has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The config template could not be saved. Please, try again.'));
        }
        $this->set(compact('configTemplate'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Config Template id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $configTemplate = $this->ConfigTemplates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $configTemplate = $this->ConfigTemplates->patchEntity($configTemplate, $this->request->getData());
            if ($this->ConfigTemplates->save($configTemplate)) {
                $this->Flash->success(__('The config template has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The config template could not be saved. Please, try again.'));
        }
        $this->set(compact('configTemplate'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Config Template id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $configTemplate = $this->ConfigTemplates->get($id);
        if ($this->ConfigTemplates->delete($configTemplate)) {
            $this->Flash->success(__('The config template has been deleted.'));
        } else {
            $this->Flash->error(__('The config template could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
