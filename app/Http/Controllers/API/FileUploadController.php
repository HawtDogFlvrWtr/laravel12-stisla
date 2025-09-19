<?php
   
namespace App\Http\Controllers\API;
   
use App\Models\FileUpload;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\FileUploadResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
   
class FileUploadController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'geojson' 	=> ['required'],
                'title' 	=> ['required'],
                'filename' 	=> ['required'],
            ]);
	    $geojson = $request->geojson;
	    $title = $request->title;
	    $filename = $request->filename;
	    $md5 = md5($request->geojson);
	    $json_version = json_decode($geojson, true);
	    $geojson_chart_metadata = [];
	    foreach ($json_version['features'][0]['properties'] as $key => $value) { # Get the first feature because they all have the same properties
            $geojson_chart_metadata['x_axis'][] = $key; # Add all to the x axis
            if (is_numeric($value)) {
                $geojson_chart_metadata['y_axis'][] = $key; # Only add numerical values to y axis
            }
	    }
	    # If we placed the file successfully
	    $file_upload = new FileUpload;
	    $file_upload->user_id = Auth::id();
	    $file_upload->filename = $filename;
	    $file_upload->geojson = $geojson;
	    $file_upload->properties_metadata = json_encode($geojson_chart_metadata);
	    $file_upload->md5 = $md5;
	    $file_upload->title = $title;
	    $file_upload->save();
	    $get_latest = FileUpload::find($file_upload->id);

            return $this->sendResponse(new FileUploadResource($get_latest), 'File Upload inserted successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $FileUpload = FileUpload::find($id);
  
        if (is_null($FileUpload)) {
            return $this->sendError('File upload not found.');
        }
   
        return $this->sendResponse(new FileUploadResource($FileUpload), 'File Upload retrieved successfully.');
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileUpload $FileUpload)
    {
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileUpload $FileUpload)
    {
    }

}
