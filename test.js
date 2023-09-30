public function update(Product $product, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
        ]);

        $input = $request->all();

        // Use the existing product instance instead of creating a new one
        $product->title = $input['title'];
        $product->price = $input['price'];
        $product->category_id = $input['category_id'];
        $product->author_id = 1;
        $product->description = $input['description'];
        $uploadImage = $request->file('image');

        if (!empty($uploadImage)) {
            \Illuminate\Support\Facades\Storage::delete('public/posts/' . $product->image);
            $filename = time() . '_' . $uploadImage->getClientOriginalName();
            $uploadImage->storeAs('public/posts', $filename);
            $product->image = $filename;
        }

        // Use the update method instead of save to update the existing record
        if ($product->update()) {
            return response()->json(
                [
                    'success' => 'Post updated successfully',
                    'product' => $product
                ],
                200
            );
        } else {
            return response()->json(['error' => 'Failed to update post'], 500);
        }
    }