#include<iostream>
#include<vector>

using namespace std;

double aitnem(vector<vector<double>> &efes, >int i, int k);
double interpolacion_newton(vector<double> x,vector<double> y,double xa);

int main()
{
    double xa = 10;
    
    vector<double> x={2,3,5};
    vector<double> y={4,9,25};
    int ya = interpolacion_newton(x,y,xa);
    cout << ya << '\n';
    
    return 0;
}

double aitnem(vector<vector<double>> &efes, >int i, int k)
{
    if ()
}

double interpolacion_newton(vector<double> x,vector<double> y,double xa)
{
    
    vector<vector<double>> efes[x.size()][y.size()];
    aitnem(efes, 0, 1);

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
