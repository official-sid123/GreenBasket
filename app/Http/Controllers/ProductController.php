<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\productrequest;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $query = Product::query();

        // // Filter by category if provided
        // if ($request->has('category')) {
        //     $query->where('category', $request->category);
        // }

        // $products = $query->simplePaginate(3);

        // return view('products.index', compact('products'));
        $query = Product::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->orWhere('category', 'like', "%$search%");
            });
        }

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->simplePaginate(3);

        return view('products.index', compact('products'));
    }

    
    public function ReverseString($string) // assignment LogicBuilding
    {
        if (!is_string($string)) {
            return "Invalid input, please enter a string.";
        }
        $reversed = strrev($string);
        echo "Reversed string is: $reversed";
    }

    public function evenOrOdd($number) // assignment LogicBuilding
    {
        if (!is_numeric($number)) {
            return "Invalid input, please enter a number.";
        }
        if ($number % 2 == 0) {
            echo "number is Even";
        } else {
            echo "number is Odd";
        }
    }

    function isPalindrome($string) //assignment LogicBuilding
    {
        // Remove spaces, punctuation, and convert to lowercase
        $processedString = preg_replace('/[^A-Za-z0-9]/', '', strtolower($string));

        // Reverse the processed string
        $reversedString = strrev($processedString);

        // Check if original processed string is the same as reversed
        return $processedString === $reversedString;
    } //Palindrome Checker 


    public function findLargest($a, $b, $c) // assignment LogicBuilding
    {
        if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
            return "Invalid input, please enter 3 numbers.";
        }

        if ($a >= $b && $a >= $c) {
            echo "$a is the largest";
        } elseif ($b >= $a && $b >= $c) {
            echo "$b is the largest";
        } else {
            echo "$c is the largest";
        }
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image_url' => 'required',
            'category' => 'required',
            'is_featured' => 'required|boolean',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('users.login')->with('error', 'You must be logged in to add a product.');
        }

        $productUser = $user->products();

        $productUser->create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image_url' => $validated['image_url'],
            'category' => $validated['category'],
            'is_featured' => $validated['is_featured']
        ]);

        return redirect()->route('products.index')->with('success', 'Product added!');
    }


    public function destroy(String $id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }

    public function edit(String $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, string $id)
    {
        //dd($request->all());
        $product = Product::findOrFail($id);

        $validated = $request->validated();

        // $validated = $request->validate([
        //     'name' => 'required|max:255',
        //     'price' => 'required|numeric|min:0|max:100000',
        //     'description' => 'required|min:10',
        //     'image_url' => 'required|url',
        //     'category' => 'required', // match your categories
        //     'is_featured' => 'sometimes|boolean',
        // ]);

        if (!$product->update($validated)) {
            return back()->with('error', 'Failed to update product');
        }

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    // public function calculateGST(String $amount)
    // {
    //     $gst = $amount * 0.18;
    //     $finalAmount = $amount + $gst;
    //     return $finalAmount;
    // }

    // function isValidEmail($email)
    // {
    //     return filter_var(trim($email), FILTER_VALIDATE_EMAIL) !== false;
    // }

    // public function testUndefinedFunction()
    // {
    //     try {
    //         // Attempt to call the undefined function
    //         if (function_exists('undefinedFunctionExample')) {
    //             undefinedFunctionExample();
    //         } else {
    //             throw new \RuntimeException('Function undefinedFunctionExample does not exist');
    //         }


    public function handleDivision($numerator, $denominator)
    {
        try {
            if ($denominator == 0) {
                throw new \InvalidArgumentException("Division by zero is not allowed");
            }

            $result = $numerator / $denominator;

            return response()->json([
                'success' => true,
                'result' => $result
            ]);
        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Invalid operation',
                'message' => $e->getMessage()
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Unexpected error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    //         return response()->json(['message' => 'Function executed']);
    //     } catch (\Error $e) {
    //         // This will catch the fatal error in PHP 7+
    //         return response()->json([
    //             'error' => 'Function call failed',
    //             'message' => $e->getMessage()
    //         ], 500);
    //     } catch (\Exception $e) {
    //         // General exception handling
    //         return response()->json([
    //             'error' => 'An error occurred',
    //             'message' => $e->getMessage()
    //         ], 500);
    //     }
    // }
    // public function testUndefinedFunction()
    // {
    //     // Calling a function that doesn't exist
    //     undefinedFunctionExample();

    //     return response()->json(['message' => 'This line will never be reached']);
    // }

    // public function testMissingFile()
    // {
    //     // 1. Raw include (will generate warning)
    //     echo "Attempting to include missing file (raw warning):<br>";
    //     include 'non_existent_config.php';
    //     echo "<br>Script continues after include warning...<br><br>";

    //     // 2. With error handling
    //     echo "Attempting with error handling:<br>";
    //     set_error_handler(function ($errno, $errstr) {
    //         if ($errno === E_WARNING && strpos($errstr, 'include') !== false) {
    //             echo "Caught Warning: [$errno] $errstr<br>";
    //             return true; // We've handled this warning
    //         }
    //         return false;
    //     });

    //     include 'another_missing_file.php';
    //     echo "Script continues after handled warning...<br>";

    //     restore_error_handler();

    //     // 3. Recommended approach with file_exists check
    //     echo "<br>Using file_exists() check:<br>";
    //     $filename = 'missing_config.php';
    //     if (file_exists($filename)) {
    //         include $filename;
    //     } else {
    //         echo "File $filename not found. Using default configuration.<br>";
    //     }

    //     return response()->json(['message' => 'Missing file test completed']);
    // }
}
