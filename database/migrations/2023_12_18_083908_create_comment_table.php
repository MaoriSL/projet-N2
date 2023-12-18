    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('text');
            $table->unsignedBigInteger('auteur_id');
            $table->unsignedBigInteger('scene_id');
            $table->timestamps();

            $table->foreign('auteur_id')->references('id')->on('users');
            $table->foreign('scene_id')->references('id')->on('scenes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
