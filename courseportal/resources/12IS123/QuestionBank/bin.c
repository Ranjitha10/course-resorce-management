#include<stdio.h>


void bin( int a , int c[20])
{
	int i=0,r=0,j=0;
	int b[20];
	//scanf("%d",&a);
	while(a>0)
	{
		r=0;
		r = a%2;
		b[i++]= r;
		a = a/2;
	}
	for(i=i-1;i>=0;i--)
	{
		c[j] = b[i];
		j++;
	}
		
}

int main()
{
	int b[20];
	int i;
	int a;
	scanf("%d",&a);
	bin(a,b);
	
	
	for(i=0;i<7;i++)
	{
		
		printf("%d",b[i]);
	
	}
		
	printf("\n\n");	
	
	return 0;
}
