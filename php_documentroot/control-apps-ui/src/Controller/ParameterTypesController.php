<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ParameterTypes Controller
 *
 * @property \App\Model\Table\ParameterTypesTable $ParameterTypes
 *
 * @method \App\Model\Entity\ParameterType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParameterTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $parameterTypes = $this->paginate($this->ParameterTypes);

        $this->set(compact('parameterTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Parameter Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parameterType = $this->ParameterTypes->get($id, [
            'contain' => ['ServerParameters']
        ]);

        $this->set('parameterType', $parameterType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parameterType = $this->ParameterTypes->newEntity();
        if ($this->request->is('post')) {
            $parameterType = $this->ParameterTypes->patchEntity($parameterType, $this->request->getData());
            if ($this->ParameterTypes->save($parameterType)) {
                $this->Flash->success(__('The parameter type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parameter type could not be saved. Please, try again.'));
        }
        $this->set(compact('parameterType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Parameter Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parameterType = $this->ParameterTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parameterType = $this->ParameterTypes->patchEntity($parameterType, $this->request->getData());
            if ($this->ParameterTypes->save($parameterType)) {
                $this->Flash->success(__('The parameter type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parameter type could not be saved. Please, try again.'));
        }
        $this->set(compact('parameterType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Parameter Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parameterType = $this->ParameterTypes->get($id);
        if ($this->ParameterTypes->delete($parameterType)) {
            $this->Flash->success(__('The parameter type has been deleted.'));
        } else {
            $this->Flash->error(__('The parameter type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
