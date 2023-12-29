<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;


use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {   // funcion que evita ver cursos no publicados
        $this->authorize('published', $course);
        
                $similares = Course::where('category_id' , $course->category_id)
                            ->where('id', '!=', $course->id)
                            ->where('status', 3)
                            ->latest('id')
                            ->take(5)
                            ->get();

             

               
        return view('courses.show', compact('course', 'similares'));
        
    }

    public function enrolled(Course $course)
    {
        $course->students()->attach(auth()->user()->id);
     
        return redirect()->route('courses.status', $course);
    }

 

    public function myCourses(){
        $courses = auth()->user()->courses_enrolled()->orderBy('course_user.created_at', 'desc')->paginate(12);

        return view('courses.my-courses', compact('courses'));
    }

    public function generateCertificate(Course $course)
    {
        

       
        $user = auth()->user();     
        // $courses = auth()->user()->courses_enrolled()
        // ->where('courses.id', $course->id)
        // ->first();
        $imagePath = public_path('storage/' . $course->image->url);
        $imageData = file_exists($imagePath) ? base64_encode(file_get_contents($imagePath)) : '';
       
        $qrcode = QrCode::generate('Texto que quieres codificar en el QR');


        $html = View::make('certificate')->with([
            'qrcode' => $qrcode,
            'user' => $user,
            'courses' => $course,
            'imageData' => $imageData,
        ])->render();    

       
        // Instancia Dompdf
        $dompdf = new Dompdf();      

        // Carga el HTML generado con el código QR en Dompdf
        $dompdf->loadHtml($html);

        // Opcional: Establece el tamaño del papel, la orientación, etc.
        $dompdf->setPaper('A4', 'landscape');

        // Renderiza el PDF
        $dompdf->render();

        // Opcional: Guarda el PDF en el servidor
        $dompdf->stream('certificado.pdf');
           

    }
    public function generateCertificate3(Course $course)
    {

       
        $user = auth()->user();     
        $courses = auth()->user()->courses_enrolled()
        ->where('courses.id', $course->id)
        ->first();
        $qrcode = QrCode::generate('Texto que quieres codificar en el QR');

        $imagePath = public_path('storage/' . $courses->image->url);
        $imageData = file_exists($imagePath) ? base64_encode(file_get_contents($imagePath)) : '';
       
      // Datos para la vista si los necesitas
      $data = [
        'courses' => $courses,
        'imageData' => $imageData,
    ];


    $dompdf = new Dompdf();

    // Renderizar la vista con los datos
    $html = View::make('certificate3', $data)->render();

    // Cargar el HTML generado en Dompdf
    $dompdf->loadHtml($html);

    // Opcional: Establecer el tamaño del papel y la orientación
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar el PDF
    $dompdf->render();

    // Descargar el PDF generado
    return $dompdf->stream('reporte_con_fondo.pdf');
           

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
