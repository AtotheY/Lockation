package api;

import java.io.BufferedReader;
import java.io.ByteArrayOutputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.Reader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.nio.charset.Charset;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

import org.json.*;
import javax.net.ssl.HttpsURLConnection;
import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import com.google.gson.JsonArray;
import com.google.gson.JsonElement;
import com.google.gson.JsonObject;
import com.google.gson.JsonParser;
import com.google.gson.annotations.SerializedName;
import com.google.gson.stream.JsonReader;

public class CapitalOne {

  //private variables
  private String APIkey;
  private List<Customer> customerList = new ArrayList<Customer>();
  
  //constructor
  public CapitalOne(String APIkey) {
    this.APIkey = APIkey;
  }
  
  public boolean addCustomers() throws Exception {
    try {
      URL url = new URL("http://api.reimaginebanking.com/customers?key=" + 
          this.APIkey);
      HttpURLConnection connection = (HttpURLConnection) url
          .openConnection();
      connection.setRequestMethod("GET");
      connection.setRequestProperty("Content-Type", "application/json");
      InputStream response = connection.getInputStream();
      InputStreamReader reader = new InputStreamReader(response);
      
      Gson gson = new Gson();
      JsonParser jsonParser = new JsonParser();
      JsonArray customers = jsonParser.parse(reader).getAsJsonArray();
      for (JsonElement aCustomer : customers) {
        Customer customer = gson.fromJson(aCustomer, Customer.class);
        this.customerList.add((Customer) customer);
      }
      return true;
    } catch (Exception e){
      return false;
    }
  }
  
  public Customer getCustomer(String id) {
    for (Customer customer:customerList) {
      if (customer._id.equals(id)) {
        return customer;
      }
    }
    return null;
  }
  
  public boolean getCustomerAccounts(Customer customer) throws Exception {
    try {
      URL url = new URL("http://api.reimaginebanking.com/customers/" + 
          customer._id + "/accounts?key=" + this.APIkey);
      HttpURLConnection connection = (HttpURLConnection) url
          .openConnection();
      connection.setRequestMethod("GET");
      connection.setRequestProperty("Content-Type", "application/json");
      InputStream response = connection.getInputStream();
      InputStreamReader reader = new InputStreamReader(response);
      
      Gson gson = new Gson();
      JsonParser jsonParser = new JsonParser();
      JsonArray accounts = jsonParser.parse(reader).getAsJsonArray();
      for (JsonElement anAccount : accounts) {
        Account account = gson.fromJson(anAccount, Account.class);
        customer.addAccount(account);
      }
    } catch (Exception e){
      return false;
    }
    return true;
  }
  
  public boolean getPurchase(Account account) throws Exception {
    List<Purchase> newPurchases = new ArrayList<Purchase>();
    try {
      URL url = new URL("http://api.reimaginebanking.com/accounts/"+ 
          account._id + "/purchases?key=" + this.APIkey);
      HttpURLConnection connection = (HttpURLConnection) url
          .openConnection();
      connection.setRequestMethod("GET");
      connection.setRequestProperty("Content-Type", "application/json");
      InputStream response = connection.getInputStream();
      InputStreamReader reader = new InputStreamReader(response);
      
      Gson gson = new Gson();
      JsonParser jsonParser = new JsonParser();
      JsonArray purchases = jsonParser.parse(reader).getAsJsonArray();
      for (JsonElement aPurchase : purchases) {
        Purchase purchase = gson.fromJson(aPurchase, Purchase.class);
        newPurchases.add(purchase);
      }
    } catch (Exception e){
      return false;
    }
    account.setPurchases(newPurchases);
    return true;
  }
  
  public boolean addPurhcase(Account account, String fName, String lName, int value, 
      String location, String date, String time) {
    try {
      URL url = new URL("http://api.reimaginebanking.com/accounts/"+ 
          account._id + "/purchases?key=" + this.APIkey);
      HttpURLConnection connection = (HttpURLConnection) url
          .openConnection();
      connection.setRequestMethod("POST");
      connection.setRequestProperty("Content-Type", "application/json");
      
      //create json object
      Gson Wgson = new GsonBuilder().create();
      SendPurchase sendpurchase = 
          new SendPurchase(date, value, location + " " + time);
      String output = Wgson.toJson(sendpurchase);
      
      // Send post request
      connection.setDoOutput(true);
      DataOutputStream wr = new DataOutputStream(connection.getOutputStream());
      wr.writeBytes(output);
      wr.flush();
      wr.close();
      
      InputStream response = connection.getInputStream();
      InputStreamReader reader = new InputStreamReader(response);
      
      Gson gson = new GsonBuilder().create();
      Purchase purchase = gson.fromJson(reader, Purchase.class);
      account.addPurchase(purchase);
      return true;
    } catch (Exception e){
      return false;
    }
  }
  
  public static void main(String[] args) {
    try {
    CapitalOne operation = new CapitalOne("8aae4c8520d59b9b068acbf5c423ded6");
    operation.addCustomers();
    for (Customer customer:operation.customerList) {
      operation.getCustomerAccounts(customer);
      for (Account account:customer.getAccounts()) {
        operation.getPurchase(account);
      }
      operation.addPurhcase(customer.getAccounts().get(0), customer.first_name, 
          customer.last_name, 100, "London", "2016-04-03", "3:14");
    }
    } catch (Exception e) {
    }
  }

}