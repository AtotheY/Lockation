package api;

import java.util.ArrayList;
import java.util.List;

public class Account {
  
  public String _id;
  public String type;
  public String nickname;
  public int rewards;
  public int balance;
  public String account_number;
  public String customer_id;
  private List<Purchase> purchases = new ArrayList<Purchase>();

  public Account(String _id, String type, String nickname, int rewards, 
      int balance, String account_number, String customer_id) {
    this._id = _id;
    this.type = type;
    this.nickname = nickname;
    this.rewards = rewards;
    this.balance = balance;
    this.account_number = account_number;
    this.customer_id = customer_id;
    this.purchases = new ArrayList<Purchase>();
  }
  
  public Purchase getLastPurchase() {
    if (purchases.size() > 0) {
    return purchases.get(purchases.size() -1);
    } else {
      return null;
    }
  }

  public void setPurchases(List<Purchase> purchases) {
    this.purchases = purchases;
  }
  
  public void addPurchase(Purchase purchase) {
    this.purchases.add(purchase);
  }
  
}
