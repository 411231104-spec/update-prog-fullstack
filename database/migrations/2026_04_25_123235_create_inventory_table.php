public function up()
{
    // Tabel Produk
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('stock');
        $table->decimal('price', 12, 2);
        $table->timestamps();
    });

    // Tabel Log Stok (Untuk Transaksi Kompleks)
    Schema::create('stock_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')->constrained();
        $table->integer('quantity'); // jumlah masuk/keluar
        $table->string('type'); // 'in' atau 'out'
        $table->text('description');
        $table->timestamps();
    });
}
