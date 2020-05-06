<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Http\Requests\UpdateProfileUserFormRequest;

class UserController extends Controller
{
    private $user;
    private $totalPage = 20;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Usuários';

        $users = $this->user->paginate($this->totalPage);

        return view('panel.users.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Novo Usuário';

        return view('panel.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserFormRequest $request)
    {
        if ($this->user->newUser($request))
            return redirect()
                ->route('users.index')
                ->with('success', 'Usuário cadastrado com sucesso!');
        else
            return redirect()->back()->with('error', 'Falha ao cadastrar usuário!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);

        if (!$user)
            return redirect()->back();

        $title = "Detalhes da  Marca: {$user->name}";

        return view('panel.users.show', compact('title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);

        if (!$user)
            return redirect()->back();

        $title = "Editar Usuário: {$user->name}";

        return view('panel.users.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        $user = $this->user->find($id);

        if (!$user)
            return redirect()->back();

        $update = $user->updateUser($request);

        if ($update)
            return redirect()
                ->route('users.index')
                ->with('success', 'Usuário atualizado com sucesso!');
        else
            return redirect()->back()->with('error', 'Falha ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);

        if (!$user)
            return redirect()->back();

        if ($user->delete())
            return redirect()
                ->route('users.index')
                ->with('success', 'Usuário deletado com sucesso!');
        else
            return redirect()->back()->with('error', 'Falha ao deletar usuário!');
    }

    public function search(Request $request)
    {
        //Para preservar os dados da paginação
        $dataForm = $request->except('_token');

        $users = $this->user->search($request->key_search, $this->totalPage); //Esse método search está implementado na model

        $title = "Users, filtros para: {$request->key_search}";

        return view('panel.users.index', compact('title', 'users', 'dataForm'));
    }

    public function myProfile()
    {
        $title = 'Meu Perfil';

        return view('site.users.profile', compact('title'));
    }

    public function updateProfile(UpdateProfileUserFormRequest $request)
    {
        $user = auth()->user();
        $user->name = $request->name;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        //Verificando se existe um arquivo e se é válido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //Pegando o nome do arquivo com o nome da imagem e concatenando com a extensão do arquivo
            if ($user->image)
                $nameFile = $user->image;
            else
                $nameFile = kebab_case($user->name) . '.' . $request->image->extension();
            //Passando o nome do arquivo para o objeto
            $user->image = $nameFile;

            //storeAs() cria a pasta users  para salvar, caso não exista
            if (!$request->image->storeAs('users', $nameFile))
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload!');
        }

        if ($user->save())
            return redirect()
                ->route('my.profile')
                ->with('success', 'Atualizado com sucesso!');
        else
            return redirect()
                ->back()
                ->with('error', 'Falha ao alterar os dados!');
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()->route('home');
    }
}
