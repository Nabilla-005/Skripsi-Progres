use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToUsernameColumn extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('username')->default('default_username')->change();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('username')->nullable()->change(); // atur ke nilai semula jika rollback
    });
}

}
