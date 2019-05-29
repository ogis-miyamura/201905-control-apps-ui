<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ServerParameters Controller
 *
 * @property \App\Model\Table\ServerParametersTable $ServerParameters
 *
 * @method \App\Model\Entity\ServerParameter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServerParametersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Servers', 'Applications', 'ParameterTypes']
        ];
        $serverParameters = $this->paginate($this->ServerParameters);

        $this->set(compact('serverParameters'));
    }

    /**
     * View method
     *
     * @param string|null $id Server Parameter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serverParameter = $this->ServerParameters->get($id, [
            'contain' => ['Servers', 'Applications', 'ParameterTypes']
        ]);

        $this->set('serverParameter', $serverParameter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serverParameter = $this->ServerParameters->newEntity();
        if ($this->request->is('post')) {
            $serverParameter = $this->ServerParameters->patchEntity($serverParameter, $this->request->getData());
            if ($this->ServerParameters->save($serverParameter)) {
                $this->Flash->success(__('The server parameter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The server parameter could not be saved. Please, try again.'));
        }
        $servers = $this->ServerParameters->Servers->find('list', ['limit' => 200]);
        $applications = $this->ServerParameters->Applications->find('list', ['limit' => 200]);
        $parameterTypes = $this->ServerParameters->ParameterTypes->find('list', ['limit' => 200]);
        $this->set(compact('serverParameter', 'servers', 'applications', 'parameterTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Server Parameter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serverParameter = $this->ServerParameters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serverParameter = $this->ServerParameters->patchEntity($serverParameter, $this->request->getData());
            if ($this->ServerParameters->save($serverParameter)) {
                $this->Flash->success(__('The server parameter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The server parameter could not be saved. Please, try again.'));
        }
        $servers = $this->ServerParameters->Servers->find('list', ['limit' => 200]);
        $applications = $this->ServerParameters->Applications->find('list', ['limit' => 200]);
        $parameterTypes = $this->ServerParameters->ParameterTypes->find('list', ['limit' => 200]);
        $this->set(compact('serverParameter', 'servers', 'applications', 'parameterTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Server Parameter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serverParameter = $this->ServerParameters->get($id);
        if ($this->ServerParameters->delete($serverParameter)) {
            $this->Flash->success(__('The server parameter has been deleted.'));
        } else {
            $this->Flash->error(__('The server parameter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
