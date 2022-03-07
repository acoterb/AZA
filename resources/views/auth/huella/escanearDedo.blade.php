@extends('admin.layouts.menu')

@section('content')

    <div id="Container">
       <div id="Scores">
           <h5>Calidad escaneada : <input type="text" id="qualityInputBox" size="20" style="background-color:#DCDCDC;text-align:center;"></h5> 

       </div>
        <div id="content-capture" style="display : none;">    
            <div id="status"></div>            
            <div id="imagediv"></div>
            <div id="contentButtons">
                <table width=70% align="center">
                    <tr>
                        <td>
                            <input type="button" class="btn btn-primary" id="start" value="Start" onclick="Javascript:onStart()">
                        </td>
                        <td>
                           <input type="button" class="btn btn-primary" id="stop" value="Stop" onclick="Javascript:onStop()">
                        </td>
                </table>
            </div>
       
            <div id="imageGallery">
            </div>
            <div id="deviceInfo">           
            </div>

            <div id="saveAndFormats">
             
              <form name="myForm" style ="border : solid grey;padding:5px;">
              <b>Acquire Formats :</b><br>
              <table>
                <tr data-toggle="tooltip" title="Will save data to a .raw file.">
                  <td>
                    <!--<input type="checkbox" name="Raw" value="1" onclick="checkOnly(this)"> RAW  <br>-->
                  </td>
                </tr>
                <tr data-toggle="tooltip" title="Will save data to a Intermediate file">
                  <td>
             <!-- <input type="checkbox" name="Intermediate" value="2" onclick="checkOnly(this)"> Feature Set<br>-->
                  </td>
                </tr>
                <tr data-toggle="tooltip" title="Will save data to a .wsq file.">
                  <td>
             <!-- <input type="checkbox" name="Compressed" value="3" onclick="checkOnly(this)"> WSQ<br>-->
                  </td>
                </tr>
                <tr data-toggle="tooltip" title="Will save data to a .png file.">
                  <td>
              <input checked type="checkbox" name="PngImage" checked="true" value="4" onclick="checkOnly(this)"> PNG
                  </td>
                </tr>
                <tr >
                  <td>
              <input  type="text" id="userName"  value="Nombre"> PNG
                  </td>
                </tr>
              </table>
              </form>
              <br>
             <input type="button" class="btn btn-primary" id="saveImagePng" value="Export" onclick="Javascript:onImageDownload()">
            </div>

        </div>

        <div id="content-reader">  
            <h4>Select Reader :</h4>
            <select class="form-control" id="readersDropDown" onchange="selectChangeEvent()">
            </select>
            <div id="readerDivButtons">
                <table width=70% align="center">
                        <tr>
                            <td>
                                <input type="button" class="btn btn-primary" id="refreshList" value="Refresh List" 
                                    onclick="Javascript:readersDropDownPopulate(false)">
                            </td>
                            <td>
                                <input type="button" class="btn btn-primary" id="capabilities" value="Capabilities"
                                data-toggle="modal" data-target="#myModal" onclick="Javascript:populatePopUpModal()">
                            </td>  
                        </tr>
                </table>

              <!-- Modal - Pop Up window content-->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content -->
                  <div class="modal-content" id="modalContent" >
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Reader Information</h4>
                    </div>
                    <div class="modal-body" id="ReaderInformationFromDropDown">
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
  
            </div>
        </div>

</div>
@endsection


@push('js')

      <script defer src="{{asset('js/digitalPersona/es6-shim.js')}}" ></script>
      <script defer src="{{asset('js/digitalPersona/fingerprint.sdk.min.js')}}" ></script>
      <script defer src="{{asset('js/digitalPersona/websdk.client.bundle.min.js')}}" ></script>
      <script defer src="{{asset('js/huellaScan/Scan2.js')}}" ></script>
      
@endpush
