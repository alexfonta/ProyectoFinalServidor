<?php



namespace App\Http\Controllers;



use App\Http\Requests\PlayerRequest;

use App\Models\Player;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;


class PlayerController extends Controller

{

    /**

     * Display a listing of the resource.

     */

    public function index()
    {
        $players = Player::get();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $players = Player::get();
        return view('players.create', compact('players'));
    }

    public function store(PlayerRequest $request)
    {
        $player = new Player();

        $player->name = $request->name;
        $player->twitter = $request->twitter;
        $player->instagram = $request->instagram;
        $player->twitch = $request->twitch;
        $player->visible = $request->boolean('visible');
        $player->age = $request->age;
        $player->role = $request->role;

        if ($request->hasFile('photo')) {
            $filename = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('players', $filename, 'public');
            $player->photo = $path;
        }

        $player->save();

        return redirect()->route('players.show', $player);
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    /**

     * Show the form for editing the specified resource.

     */

    public function edit(Player $player)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     */

    public function update(Request $request, Player $player)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     */

    public function destroy(Player $player)

    {

        //

    }

}
