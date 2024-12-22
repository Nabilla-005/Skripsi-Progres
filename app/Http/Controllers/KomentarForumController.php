<?php

use App\Models\komentar_forum;
use App\Models\forum_diskusi;
use Illuminate\Http\Request;

class KomentarForumController extends Controller
{
    // Menambah komentar pada forum
    public function store(Request $request, $forumId)
    {
        $request->validate([
            'isi' => 'required|string|max:500',
        ]);

        komentar_forum::create([
            'id_forum' => $forumId,
            'id_pengirim' => auth()->id(),
            'isi' => $request->isi,
        ]);

        return redirect()->route('forum.show', $forumId);
    }

    // Menghapus komentar
    public function destroy($id)
    {
        $komentar = komentar_forum::findOrFail($id);
        $komentar->delete();

        return redirect()->route('forum.index');
    }
}

