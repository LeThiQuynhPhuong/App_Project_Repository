package com.example.do_angame;

import android.content.Context;
import android.graphics.Bitmap;
import android.net.Uri;
import android.util.Base64;
import android.util.Log;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;
import java.nio.charset.StandardCharsets;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.HashMap;
import java.util.Map;

import static com.android.volley.Request.Method;

public class NetworkUtils {
    private static final String LOG_TAG = NetworkUtils.class.getSimpleName();
    private static final String BASE_URL="http://10.0.2.2:8000/api/";

   static String doRequest(String uri, String method, HashMap<String,String> params, String token)
    {
        String jsonString=null;
        HttpURLConnection urlConnection = null;
        Uri.Builder builder = Uri.parse(BASE_URL + uri).buildUpon();
        if(params!=null){
            for (Map.Entry<String,String>pa: params.entrySet())
            {
                builder.appendQueryParameter(pa.getKey(),pa.getValue());
            }
        }
        Uri builtURI = builder.build();

        try{
            URL requestURL = new URL(builtURI.toString());
            urlConnection = (HttpURLConnection) requestURL.openConnection();
            urlConnection.setRequestMethod(method);
            if(token!=null){
                urlConnection.setRequestProperty("Authorization",token);
            }
            urlConnection.connect();

            //get inputStream
            InputStream inputStream = urlConnection.getInputStream();
            jsonString = convertToString(inputStream);
        } catch (IOException e){
            e.printStackTrace();
        }finally {
            {
                if (urlConnection != null)
                {
                    urlConnection.disconnect();
                }
            }
            Log.d(LOG_TAG, jsonString);
            return jsonString;
        }
    }
   private static String getPostDataString(HashMap<String, String> params) throws UnsupportedEncodingException{
       StringBuilder result = new StringBuilder();
       boolean first = true;
       for (Map.Entry<String,String>entry:params.entrySet()){
           if(first)
               first= false;
           else
               result.append("&");
           result.append(URLEncoder.encode(entry.getKey(),"UTF-8"));
           result.append("=");
           result.append(URLEncoder.encode(entry.getValue(),"UTF-8"));
       }
       return result.toString();
   }
   public static String postRequest(String uri, HashMap<String, String> postDataParams){
       String jsonString = null;
       URL url;
       try{
           url = new URL(BASE_URL + uri);
           HttpURLConnection conn = (HttpURLConnection) url.openConnection();
           conn.setReadTimeout(15000);
           conn.setConnectTimeout(15000);
           conn.setRequestMethod("POST");
           conn.setDoInput(true);
           conn.setDoOutput(true);

           OutputStream os = conn.getOutputStream();
           BufferedWriter writer = new BufferedWriter(new OutputStreamWriter(os,"UTF-8"));
           writer.write(getPostDataString(postDataParams));
           writer.flush();
           writer.close();
           os.close();
           int responseCode = conn.getResponseCode();
           if(responseCode == HttpURLConnection.HTTP_OK){
               jsonString = convertToString(conn.getInputStream());
           }
           else
           {
               jsonString = "{'success': false}";
           }
       } catch (Exception e){
           e.printStackTrace();
       }
       Log.d(LOG_TAG,jsonString);
       return jsonString;
   }
    static String convertToString(InputStream stream) {
        BufferedReader reader = new BufferedReader(new InputStreamReader(stream));
        StringBuilder builder = new StringBuilder();
        String line;
        try{
            while ((line= reader.readLine())!=null){
                builder.append(line);
                builder.append("\n");
            }
        } catch (IOException e)
        {
            e.printStackTrace();
        }finally {
            if(reader != null){
                try {
                    reader.close();
                }catch (IOException e)
                {
                    e.printStackTrace();
                }
            }
        }
        if(builder.length()==0)
        {
            return null;
        }
        return builder.toString();
    }
    //ham cua anh
    public static HttpURLConnection connectionPOST(String duongdan){
        try {
            URL url=new URL(duongdan);
            HttpURLConnection connection= (HttpURLConnection) url.openConnection();
            connection.setRequestMethod("POST");
            connection.setConnectTimeout(20000);
            connection.setReadTimeout(20000);
            connection.setDoOutput(true);
            connection.setDoInput(true);
            return connection;
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
        return null;

    }
    public static void PostAPI(final Context context, final Map<String,String> mMap, String duongdan) {
        //Khởi tạo stringrequest với method = post, đường dẫn
        StringRequest stringRequest = new StringRequest(Method.POST, duongdan, new Response.Listener<String>() {
            @Override//Kết quả trả về
            public void onResponse(String response) {
//                try {
//                    JSONArray jr = new JSONArray(response);
//                    JSONObject jb = jr.getJSONObject(5);
//                } catch (JSONException e) {
//                    e.printStackTrace();
//                }
                Toast.makeText(context, "Thành công", Toast.LENGTH_SHORT).show();
            }
        }, new Response.ErrorListener() { //Kết quả trả về nếu lỗi
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(context, "Thất bại", Toast.LENGTH_SHORT).show();
            }
        }) {
            @Override
            public String getBodyContentType() { //Định dạng chuỗi trả về UTF-8
                return "application/x-www-form-urlencoded; charset=UTF-8";
            }

            @Override
            //Giá trị truyên vồ là 1 map <String,String>
            // String 1: là tên request.
            // String 2 là giá trị....
            // ví dụ localhost:8000/api?concunhonho=8.35cm
            //String 1: concunhonho - String 2= 8.35cm
            protected Map<String, String> getParams() throws AuthFailureError {
//                Map<String,String> params=mMap;
//                for(String key:mMap.keySet()){
//                    params.put( key,mMap.get(key));
//                }

                return mMap;

            }
        };
        //Khởi tạo 1 request chuẩn bị thực thi
        RequestQueue requestQueue= Volley.newRequestQueue(context);
        //Thực thi request
        requestQueue.add(stringRequest);// Rồi còn thắc mắc nào ko
        //Map<String,String> map = new Hashmap<>();
        //String 1 là key, String 2 là value (có thể thay = int,float,double,...)
    }
    //get API
    public static void GetAPIXacNhanLayMK(final Context context, final Map<String,String> mMap, String duongdan) {
        final EditText edit_mk,edit_xnmk;
        //Khởi tạo stringrequest với method = post, đường dẫn
        StringRequest stringRequest = new StringRequest(Method.GET, duongdan, new Response.Listener<String>() {
            @Override//Kết quả trả về
            public void onResponse(String response) {
//                try {
//                    JSONArray jr = new JSONArray(response);
//                    JSONObject jb = jr.getJSONObject(5);
//                } catch (JSONException e) {
//                    e.printStackTrace();
//                }

                Toast.makeText(context, "Thành công", Toast.LENGTH_SHORT).show();
            }
        }, new Response.ErrorListener() { //Kết quả trả về nếu lỗi
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(context, "Thất bại", Toast.LENGTH_SHORT).show();
            }
        }) {
            @Override
            public String getBodyContentType() { //Định dạng chuỗi trả về UTF-8
                return "application/x-www-form-urlencoded; charset=UTF-8";
            }

            @Override
            //Giá trị truyên vồ là 1 map <String,String>
            // String 1: là tên request.
            // String 2 là giá trị....
            // ví dụ localhost:8000/api?concunhonho=8.35cm
            //String 1: concunhonho - String 2= 8.35cm
            protected Map<String, String> getParams() throws AuthFailureError {
//                Map<String,String> params=mMap;
//                for(String key:mMap.keySet()){
//                    params.put( key,mMap.get(key));
//                }

                return mMap;

            }
        };
        //Khởi tạo 1 request chuẩn bị thực thi
        RequestQueue requestQueue= Volley.newRequestQueue(context);
        //Thực thi request
        requestQueue.add(stringRequest);// Rồi còn thắc mắc nào ko
        //Map<String,String> map = new Hashmap<>();
        //String 1 là key, String 2 là value (có thể thay = int,float,double,...)
    }
    public static String GetAPIJSON(String duongdan){
        HttpURLConnection urlConnection=null;
        StringBuilder stringBuilder=new StringBuilder();
        BufferedReader bufferedReader=null;
        try {
            URL url=new URL(duongdan);
            urlConnection= (HttpURLConnection) url.openConnection();
            urlConnection.setRequestMethod("GET");
            InputStream inputStream=urlConnection.getInputStream();
            InputStreamReader inputStreamReader=new InputStreamReader(inputStream);
            bufferedReader=new BufferedReader(inputStreamReader);
            String line;
            while ((line=bufferedReader.readLine())!=null) {
                stringBuilder.append(line);
            }
            if (stringBuilder.length()==0){
                return null;
            }

        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
        finally {
            if(urlConnection!=null){
                urlConnection.disconnect();
            }
            if(bufferedReader!=null){
                try {
                    bufferedReader.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }
        }
        return stringBuilder.toString();
    }
    //endecode bitmap
    public static String encodeBitmapToString(Bitmap bmp){
        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.JPEG, 100, baos);
        byte[] imageBytes = baos.toByteArray();
        String encodedImage = Base64.encodeToString(imageBytes, Base64.DEFAULT);
        return encodedImage;
    }
    public static String convertHashToStringMD5(String text) throws NoSuchAlgorithmException {
        MessageDigest md = MessageDigest.getInstance("MD5");
        byte[] hashInBytes = md.digest(text.getBytes(StandardCharsets.UTF_8));
        StringBuilder sb = new StringBuilder();
        for (byte b : hashInBytes) {
            sb.append(String.format("%02x", b));
        }
        return sb.toString();
    }



















}
