#include<iostream>
#include<vector>

using namespace std;

double interpolacion_lagrange(vector<double> x,vector<double> y,double xa);

int main()
{
    double xa = 10;
    
    vector<double> x={2,3,5,7};
    vector<double> y={4,9,25,49};
    int ya = interpolacion_lagrange(x,y,xa);
    cout << ya << '\n';
    
    return 0;
}

double interpolacion_lagrange(vector<double> x,vector<double> y,double xa)
{
    double ya=0;
    for(int i=0; i<=y.size()-1; i++){
        double prod=y[i];
        for(int j=0; j<=x.size()-1; j++){
            if(i!=j){
                prod *= (xa-x[j])/(x[i]-x[j]);
            }
        }        
        ya += prod;
    }
    return ya;
}
