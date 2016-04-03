package api;

public class Purchase {
  
  public String getLocation() {
    return description;
  }

  public void setLocation(String location) {
    this.description = location;
  }

  public String _id;
  public String type;
  public String merchant_id;
  public String payer_id;
  public String purchase_date;
  public int amount;
  public String status;
  public String medium;
  public String description;
  
  Purchase(String _id, String type, String merchant_id, String payer_id, 
      String purchase_date, int amount, String status, String medium, 
      String description) {
    this._id = _id;
    this.type = type;
    this.merchant_id = merchant_id;
    this.payer_id = payer_id;
    this.purchase_date = purchase_date;
    this.amount = amount;
    this.status = status;
    this.medium = medium;
    this.description = description;
  }

}
