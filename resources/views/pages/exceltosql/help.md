# exceltosql
this page i sused for AntaQaddha Report .

you have to upload 4 sheets of excell to the system 
you need to edit the event of upload btn and change the parapeter which will 
be sent to the ajax , you have to specify the name of targeted file to upload.
the name will be the same as the map file [json] file in storage/excellmaps
in the JSON files you have to edit the const parameter which has the Year nad Quarter .

the upload file btn is hidden you have to show it by changing style value to block.

after fixing JSON maps and all your excell sheets are ready with the correct form and
order of columns as in JSON map files you can upload these files.

uplads:<br/>
      upload_cash <br/>
      upload_packages<br/>
      upload_subscription<br/>
      upload_system<br/>
      upload_bctarget<br/>

after uploading all these files you can now run the migrate btns
migrate staff<br/>
migrate bctarget<br/>

then you can render the result and all is done .

to change the formula parameters go to the ajax function in controllers for
migrate bctarget and you can change these parameters whihc sent to the script .





    

