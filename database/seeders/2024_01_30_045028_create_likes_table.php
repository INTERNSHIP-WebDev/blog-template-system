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
            Schema::create('likes', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('temp_id');
                $table->timestamps();

                // Define foreign key constraints
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('temp_id')->references('id')->on('templates')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('likes');
        }
    };